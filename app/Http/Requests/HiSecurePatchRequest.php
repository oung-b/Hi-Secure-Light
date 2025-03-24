<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class HiSecurePatchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
//            'ids' => ['required', 'string', 'max:10', 'alpha_num', 'unique:' . User::class],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', Rules\Password::defaults()->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => ['required_with::password', 'same:password'],
            'group_id' => ['required', 'integer'],
//            'authority_id' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'period_of_use' => ['required', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
