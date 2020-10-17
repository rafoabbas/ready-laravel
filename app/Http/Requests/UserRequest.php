<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => request('id') ? 'required|string|email|max:255|unique:users,email,'.request('id'): 'required|string|email|max:255|unique:users' ,
            'username' => request('id') ? 'required|string|max:255|unique:users,username,'.request('id') : 'required|string|max:255|unique:users',
            'phone' => request('id') ? 'required|numeric|unique:users,phone,'.request('id') : 'required|numeric|unique:users',
            'password' => (request()->method() == 'POST' or (request()->method() == 'PUT' and request('password'))) ? 'required|string|min:6|confirmed' : '',
            'avatar'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
