<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:clients',
            'phone' => 'required|unique:clients|regex:/(01)[0-9]{9}/',
            'working_days' => 'required',
            'holiday' => 'required',
            'commercial_register' => 'required|mimes:pdf|max:10000',
            'tax_card' => 'required|mimes:jpg,png,jpeg,gif,svg,jfif|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
           
        ];
    }
}
