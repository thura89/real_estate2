<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminUserRequest extends FormRequest
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
        $id = $this->route('admin_user');
        return [
            'name' => 'required',
            'user_type' => 'required',
            'email' => [
                'required','email',
                Rule::unique('users')->ignore($id , 'id'),
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($id , 'id'),
            ],
            'address' => 'required',
        ];
    }
}
