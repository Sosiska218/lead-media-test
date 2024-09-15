<?php

namespace App\Http\Requests\Company;

use App\Http\Requests\UniqueRequest;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class UpdateRequest extends UniqueRequest
{
    protected array $errors = [
        'name' => 'Name is busy',
        'email' => 'Email is busy',
    ];

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:4', 'max:255'],
            'site_url' => ['required', 'url', 'max:191'],
        ];
    }

    public function validateUnique(Model $model, array $requestData): void
    {
        foreach ($this->errors as $column => $error) {
            $searchCompany = Company::query()->firstWhere($column, $requestData[$column]);
            if (!is_null($searchCompany) && ($searchCompany->id !== $model->id)) {
                $this->uniqueErrors[$column] = $error;
            }
        }
    }
}
