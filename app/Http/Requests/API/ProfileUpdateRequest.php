<?php

namespace App\Http\Requests\API;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = auth()->user();
        return [
            'name' => 'required',
            'company_name' => 'required',
            'email' => [
                'required','email',
                Rule::unique('users')->ignore($id , 'id'),
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($id , 'id'),
            ],

            'user_type' => 'required|in:4,5,6',
            'agent_type' => 'required_if:user_type,==,4',
            'address' => 'required',
        ];
    }
}
