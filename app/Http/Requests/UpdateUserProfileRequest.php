<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'payload' => ['required', 'array'],
            'payload.emails' => ['nullable', 'array'],
            'payload.emails.*.email' => ['nullable', 'email', 'max:255'],
            'payload.emails.*.start_date' => ['nullable', 'date'],
            'payload.emails.*.end_date' => ['nullable', 'date'],
            'payload.phone_numbers' => ['nullable', 'array'],
            'payload.phone_numbers.*.number' => ['nullable', 'string', 'max:50'],
            'payload.phone_numbers.*.extension' => ['nullable', 'string', 'max:20'],
            'payload.phone_numbers.*.start_date' => ['nullable', 'date'],
            'payload.phone_numbers.*.end_date' => ['nullable', 'date'],
            'payload.addresses' => ['nullable', 'array'],
            'payload.addresses.*.address' => ['nullable', 'string', 'max:500'],
            'payload.addresses.*.location' => ['nullable', 'string', 'max:255'],
            'payload.addresses.*.start_date' => ['nullable', 'date'],
            'payload.addresses.*.end_date' => ['nullable', 'date'],
            'payload.vsn_numbers' => ['nullable', 'array'],
            'payload.vsn_numbers.*.vsn' => ['nullable', 'string', 'max:100'],
            'payload.vsn_numbers.*.start_date' => ['nullable', 'date'],
            'payload.vsn_numbers.*.end_date' => ['nullable', 'date'],
        ];
    }
}
