<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewProjectRequest extends FormRequest
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
            /* Address */
            'region' => 'required',
            'township' => 'required',
            // 'wards' => 'required',
            // 'street_name' => 'required',
            'townsandvillages' => 'required',
            // 'type_of_street' => 'required',

            /* Price */
            'area_unit' => 'required',
            'min_price' => 'required',
            'max_price' => 'required',
            'currency_code' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required',

            /* Situation */
            'new_project_sale_type' => 'required',
            'preparation' => 'required',
            'project_start_at' => 'required',
            'project_end_at' => 'required',

            /* Description */
            'about_project' => 'required',

        ];
    }
}
