<?php

namespace App\Http\Requests\Employee;

use App\Http\Requests\UniqueRequest;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class UpdateRequest extends UniqueRequest
{
    protected array $errors = [
        'email' => 'Email is busy',
    ];

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:4', 'max:255'],
            'phone' => ['required', 'string', 'min:3', 'max:255'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ];
    }

    public function validateUnique(Model $model, array $requestData): void
    {
        foreach ($this->errors as $column => $error) {
            $searchCompany = Employee::query()->firstWhere($column, $requestData[$column]);
            if (!is_null($searchCompany) && ($searchCompany->id !== $model->id)) {
                $this->uniqueErrors[$column] = $error;
            }
        }
    }
}
