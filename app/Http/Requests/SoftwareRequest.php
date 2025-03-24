<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoftwareRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'system_id' => ['required'],
            'name' => ['required'],
            'firmware' => ['nullable'],
            'application' => ['nullable'],
            'patch_level' => ['nullable'],
            'purpose' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
