<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWant2BuyRentRequest extends FormRequest
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
            /* Info */
            'properties_category' => 'required',
            'properties_type' => 'required',
            'title' => 'required',
            'phone_no' => 'required|digits_between:9,11',

            /* Address */
            'region' => 'required',
            'township' => 'required',

            /* AreaSize */
            'area_option' => 'required|numeric',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',
            'area_width' => 'required_if:area_option,==,1',
            'area_length' => 'required_if:area_option,==,1',

            'floor_level' => 'required_if:properties_category,3,4,6,8',

            'repairing' => 'required',
            'situations' => 'required',

            /* Budget Price */
            'budget_from' => 'required|numeric',
            'budget_to' => 'required|numeric',
            'currency_code' => 'required',

            /* Description */
            'descriptions' => 'required',

            /* Term And Condition */
            'terms_condition' => 'required',
        ];
    }
}
