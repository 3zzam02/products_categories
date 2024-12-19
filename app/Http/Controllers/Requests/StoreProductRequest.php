<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    
    
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name must not exceed 255 characters.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a valid number.',
            'price.min' => 'The product price must be at least 0.',
            'category_id.required' => 'The category ID is required.',
            'category_id.exists' => 'The selected category does not exist.',
        ];
    }
}
