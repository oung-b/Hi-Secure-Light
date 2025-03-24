<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PolicyPatchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'source_ip_object_list' => ['required'],
            'destination_ip_object_list' => ['required'],
            'service_object' => ['required'],
            'action' => ['required', 'in:1, 2'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
