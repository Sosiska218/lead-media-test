<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255', 'unique:companies,name'],
            'email' => ['required', 'email', 'min:4', 'max:255', 'unique:companies,email'],
            'site_url' => ['required', 'url', 'max:191'],
        ];
    }
}
