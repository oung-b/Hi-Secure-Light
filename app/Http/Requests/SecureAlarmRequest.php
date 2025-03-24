<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecureAlarmRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'found_started_at' => ['required', 'date'],
            'found_finished_at' => ['required'],
            'pivot' => ['nullable'],
            'count' => ['required', 'integer'],
            'level' => ['required'],
            'sip' => ['nullable'],
            'dip' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
