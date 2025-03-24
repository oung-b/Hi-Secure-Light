<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ApiController
{
    public function login(Request $request)
    {
        $user = User::where("ids", $request->ids)->first();

        if(!$user)
            return $this->respondForbidden("Invalid Information");

        if(!Hash::check($request->password, $user->password))
            return $this->respondForbidden("Invalid Information");

        return $this->respondSuccessfully(UserResource::make($user));
    }

    public function index(Request $request)
    {
        $items = User::latest()->paginate(60);

        return UserResource::collection($items);
    }

    public function store(Request $request)
    {
        $request->validate([
            "ids" => "required|string|max:500|unique:users",
            "password" => "required|string|min:6|confirmed",
            "authority" => "required|integer",
            "email" => "required|string|max:500"
        ]);

        $user = User::create(array_merge($request->all(), [
            "password" => Hash::make($request->password)
        ]));

        return $this->respondSuccessfully(UserResource::make($user));
    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            "password" => "required|string|min:6|confirmed",
            "authority" => "required|integer",
            "email" => "required|string|max:500"
        ]);

        $user->update(array_merge($request->all(), [
            "password" => Hash::make($request->password)
        ]));

        return $this->respondSuccessfully(UserResource::make($user));
    }

    public function destroy(Request $request)
    {
        User::whereIn("id", $request->ids)->delete();

        return $this->respondSuccessfully();
    }
}
