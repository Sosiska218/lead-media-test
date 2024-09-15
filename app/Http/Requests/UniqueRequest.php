<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

abstract class UniqueRequest extends FormRequest
{
    protected array $uniqueErrors = [];

    abstract public function validateUnique(Model $model, array $requestData): void;

    public function getUniqueErrors(): array
    {
        return $this->uniqueErrors;
    }
}
