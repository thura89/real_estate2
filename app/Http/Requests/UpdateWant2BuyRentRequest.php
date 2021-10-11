<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWant2BuyRentRequest extends FormRequest
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
            'phone_no' => 'required',

            /* AreaSize */
            'area_unit' => 'required',
            'area_width' => 'required',
            'area_length' => 'required',
            'completion' => 'required',
            'floor_level' => 'required_if:properties_category,==,3',
            'furnished_status' => 'required_if:properties_category,==,3',

            /* Budget Price */
            'budget_from' => 'required',
            'budget_to' => 'required',
            'currency_code' => 'required',

            /* Description */
            'descriptions' => 'required',

            /* Broker */
            'co_broke' => 'required',

            /* Term And Condition */
            'terms_condition' => 'required',
        ];
    }
}
