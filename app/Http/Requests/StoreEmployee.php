<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'employee_id'=>'required|unique:users,employee_id',
            'name'=>'required',
            'phone'=>'required|min:9|max:11|unique:users,phone',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:15',
            'nrc_number'=>'required',
            'gender'=>'required',
            'birthday'=>'required',
            'address'=>'required',
            'department'=>'required',
            'date_of_join'=>'required',
            'is_present'=>'required',
            'profile_img'=>'required|mimes:jpg,jpeg,png',
        ];
    }
}
