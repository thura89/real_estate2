<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminUserRequest extends FormRequest
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
            'name' => 'required',
            'user_type' => 'required',
            'region' => 'required',
            'township' => 'required',
            'email' => 'required|unique:users|email|max:60',
            'phone' => 'required|min:6|max:11|unique:users,phone',
            'address' => 'required',
            'profile_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'cover_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'password' => 'required|min:6|max:20',
        ];
    }
}
