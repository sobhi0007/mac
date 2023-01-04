<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
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
            'email'=>'required|email|unique:employees',
            'password'=>'required|min:6|max:12',
            'role'=>'required|int',
            'gender'=>'required|in:male,female',
            'branch'=>'required|int',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            
        ];
    }
}
