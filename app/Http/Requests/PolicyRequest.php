<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'policyType' => ['required'],
            'name' => ['required'],
            'source' => ['required'],
            'destination' => ['required'],
            'service' => ['required'],
            'action' => ['required', 'in:accept,block'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
