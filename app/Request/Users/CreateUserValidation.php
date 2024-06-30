<?php

namespace App\Request\Users;

use App\Request\BaseRequestFormApi;

class CreateUserValidation extends BaseRequestFormApi {

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}