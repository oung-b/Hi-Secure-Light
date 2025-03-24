<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'source_ip_object' => ['required'],
            'destination_ip_object' => ['required'],
            'service_object' => ['required'],
            'action' => ['required', 'in:1, 2'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
