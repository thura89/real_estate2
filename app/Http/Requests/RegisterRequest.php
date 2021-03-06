<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'company_name' => 'required',
            'user_type' => 'required|in:4,5,6',
            'agent_type' => 'required_if:user_type,==,4',
            'address' => 'required',
            'profile_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'cover_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:6|max:11|unique:users,phone',
            'password' => 'required|min:6|max:20',
        ];
    }
}
