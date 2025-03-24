<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HardwareRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'system_id' => ['required'],
            'name' => ['required'],
            'location' => ['required'],
            'model' => ['nullable'],
            'q_type' => ['nullable'],
            'version' => ['nullable'],
            'rj45' => ['nullable'],
            'usb' => ['nullable'],
            'serial' => ['nullable'],
            'ip_address' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
