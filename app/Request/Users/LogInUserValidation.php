<?php

namespace App\Request\Users;

use App\Request\BaseRequestFormApi;

class LogInUserValidation extends BaseRequestFormApi {

    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}