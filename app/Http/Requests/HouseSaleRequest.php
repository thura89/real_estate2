<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseSaleRequest extends FormRequest
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
            'region' => 'required',
            'township' => 'required',
            'street_name' => 'required',
            'type_of_street' => 'required',
            'ward' => 'required',
            'building_name' => 'required_if:property_category,==,6',

            /* Area Size */
            'measurement' => 'required',
            'front_area' => 'required',
            'building_width' => 'required',
            'building_length' => 'required',
            'fence_width' => 'required_if:property_category,==,1',
            'fence_length' => 'required_if:property_category,==,1',
            'floor_level' => 'required_if:property_category,==,6',

            /* Partation */
            'partation_type' => 'required',
            'bed_room' => 'required_if:partation_type,==,2',
            'bath_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            'water' => 'required',
            'electric' => 'required',

            /* Situation */
            'year_of_construction' => 'required',
            'building_repairing' => 'required',
            'building_condition' => 'required',
            'type_of_building' => 'required_if:property_category,==,1',
            'shop_type' => 'required_if:property_category,==,6',

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

            /* Image */
            'images' => 'required',
            
        ];
    }
}
