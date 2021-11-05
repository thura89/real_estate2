<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileDeveloperRequest extends FormRequest
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
            'address' => 'required',
        ];
    }
}
