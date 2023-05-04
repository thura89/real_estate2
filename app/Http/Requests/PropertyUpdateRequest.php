<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyUpdateRequest extends FormRequest
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

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'price' => 'required',
            'currency_code' => 'required',

            /* image */
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
            'price.required_if' => 'Sale Price is required',
            'currency_code.required_if' => 'Sale Currency Code is required',
        ];
    }
}