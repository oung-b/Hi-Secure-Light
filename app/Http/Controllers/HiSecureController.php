<?php

namespace App\Http\Controllers;

use App\Http\Requests\HiSecurePatchRequest;
use App\Http\Requests\HiSecureRequest;
use App\Models\Authority;
use App\Models\GlobalSetting;
use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class HiSecureController extends Controller
{
    protected $userLogController;

    public function __construct(UserLogController $userLogController)
    {
        $this->userLogController = $userLogController;
    }

    public function index()
    {
        $users = User::with('group')->where('id', '>', 1)->get();
        return view('user.hi-secure.HiSecure_account')->with('users', $users);
    }

    public function create(): View
    {
        $groups = Group::get();
        $authorities = Authority::get();
        return view('user.hi-secure.HiSecure_account_add')->with('groups', $groups)->with('authorities', $authorities);
    }

    public function store(HiSecureRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        $validated['period_of_use'] = Carbon::createFromFormat('m/d/Y', $validated['period_of_use'])->format('Y-m-d');

        $user = User::create($validated);
        $this->userLogController->log("user_id:{$user->id}, user_ids:{$user->ids} created");

        event(new Registered($user));

        return redirect()->route('hi-secure.index');
    }

    public function edit(User $user)
    {
        $groups = Group::get();
        $authorities = Authority::get();
        $user->period_of_use = Carbon::createFromFormat('Y-m-d', $user->period_of_use)->format('m/d/Y');
        return view('user.hi-secure.HiSecure_account_modify')->with('user', $user)->with('groups', $groups)->with('authorities', $authorities);
    }

    public function update(HiSecurePatchRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }
        $validated['period_of_use'] = Carbon::createFromFormat('m/d/Y', $validated['period_of_use'])->format('Y-m-d');
        $user->password_count = 0;

        $user->update($validated);
        $this->userLogController->log("user_id:{$user->id}, user_ids:{$user->ids} updated");

        return redirect()->route('hi-secure.index');
    }

//    public function switch(Request $request, User $user)
//    {
//        $user->is_active = $request->input('switch') == "true" ? 1 : 0;
//        $user->push();
//    }

    public function delete(Request $request)
    {
        if (!empty($request->input('id'))) {
            $count = count($request->input('id'));
            $idArr = implode(', ', $request->input('id'));
            $this->userLogController->log("{$count} user:[{$idArr}] deleted");
            User::whereIn('id', $request->input('id'))->delete();
        }
        return redirect()->route('hi-secure.index');
    }
    public function globalSetting()
    {
        $globalSetting = GlobalSetting::first();
        return view('user.hi-secure.HiSecure_account_setting')->with('globalSetting', $globalSetting);
    }

    public function globalSettingUpdate(Request $request)
    {
        $validated = $request->validate([
            'lifetime' => ['required', 'integer', 'min:1'],
            'warning_text' => ['required', 'string']
        ]);

        // .env 파일의 경로 설정
        $envFilePath = base_path('.env');

        // .env 파일을 읽어옴
        $envFileContent = File::get($envFilePath);

        // SESSION_LIFETIME 값을 업데이트
        $newEnvFileContent = preg_replace('/SESSION_LIFETIME=\d+/', 'SESSION_LIFETIME=' . $validated['lifetime'], $envFileContent);

        // 업데이트된 내용을 .env 파일에 쓰기
        File::put($envFilePath, $newEnvFileContent);

        GlobalSetting::first()->update([
            'warning_text' => $validated['warning_text']
        ]);
        return redirect()->route('hi-secure.global-setting');
    }
}
