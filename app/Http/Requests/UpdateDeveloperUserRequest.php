<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeveloperUserRequest extends FormRequest
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
        $id = Auth()->user()->id;
        return [
            'company_name' => 'required',
            'email' => 'sometimes|email|unique:developer_users,email,'.$id,
            'phone' => 'sometimes|min:6|max:11|unique:developer_users,phone,'.$id,
            'address' => 'required',
        ];
    }
}
