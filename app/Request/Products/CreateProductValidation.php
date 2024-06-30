<?php

namespace App\Request\Products;

use App\Request\BaseRequestFormApi;

class CreateProductValidation extends BaseRequestFormApi {

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:50',
            'description' => 'nullable|string|min:3|max:255',
            'size' => 'required|numeric|min:30|max:100',
            'color' => 'required|in:red,blue,green',
            'price' => 'nullable|numeric|min:1|max:1000',
            
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}