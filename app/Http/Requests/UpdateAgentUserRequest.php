<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAgentUserRequest extends FormRequest
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
            'company_name' => 'required',
            'email' => 'required|email|unique:admin_users,email',
            'phone' => 'required|min:6|max:11|unique:admin_users,phone',
            'address' => 'required',
            'images' => 'required',
        ];
    }
}
