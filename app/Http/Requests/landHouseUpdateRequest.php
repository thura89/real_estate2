<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class landHouseUpdateRequest extends FormRequest
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
            'title' =>  'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required_if:property_category,==,7',
            
            /* AreaSize */
            'measurement' => 'required',
            'front_area' => 'required',
            'fence_width' => 'required',
            'fence_length' => 'required',
            'building_width' => 'required_if:property_category,==,7',
            'building_length' => 'required_if:property_category,==,7',
            
            /* partation */
            'partation_type' => 'required_if:property_category,2|required_if:property_category,7',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'building_repairing' => 'required',
            'fence_condition' => 'required_if:property_category,==,2',
            'land_type' => 'required_if:property_category,==,5',
            'industrial_type' => 'required_if:property_category,==,7',
            'year_of_construction' => 'required_if:property_category,==,7',
            'building_condition' => 'required_if:property_category,==,7',
            
            /* Property Type */
            'property_type' => 'required',

            /* Payment */
            'purchase_type' => 'required',
            'installment' => 'required_if:property_type,==,1',

            /* Rent Price */
            'price' => 'required_if:property_type,==,2',
            'currency_code' => 'required_if:property_type,==,2',
            'price_by_area' => 'required_if:property_type,==,2',
            'area' => 'required_if:property_type,==,2',
            'minimum_month' => 'required_if:property_type,==,2',
            'rent_pay_type' => 'required_if:property_type,==,2',
            'rent_payby_daily' => 'required_if:property_type,==,2',

            /* Sale Price */
            'sale_price' => 'required_if:property_type,==,1',
            'sale_currency_code' => 'required_if:property_type,==,1',
            'sale_price_by_area' => 'required_if:property_type,==,1',
            'sale_area' => 'required_if:property_type,==,1',

        ];
    }
}
