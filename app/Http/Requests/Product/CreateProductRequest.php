<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|max:100|string',
            'description'=>'required|max:255|string',
            'image'=>'required|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'price'=>'required|numeric|gt:0', 
            'language'=>'required', 
        ];
    }
}
