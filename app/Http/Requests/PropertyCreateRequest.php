<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyCreateRequest extends FormRequest
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
            'property_category' => 'required',
            'title' => 'required',
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_option' => 'required',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',

            /* Situation */
            'building_repairing' => 'required',
            'building_condition' => 'required',

            /* Property Type */
            'property_type' => 'required',

            /* Sale Price */
            'price' => 'required_if:property_type,==,1',
            'currency_code' => 'required_if:property_type,==,1',

            /* Image */
            'images' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'width.required_if' => 'Width is required',
            'length.required_if' => 'Length is required',
            'area_size.required_if' => 'Area Size is required',
            'area_unit.required_if' => 'Area Unit is required',

            /* Sale Price */
            'price.required_if' => 'Price is required',
            'currency_code.required_if' => 'Currency Code is required',
        ];
    }
}
