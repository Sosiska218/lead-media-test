<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:4', 'max:255', 'unique:employees,email'],
            'phone' => ['required', 'string', 'min:3', 'max:255'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ];
    }
}
