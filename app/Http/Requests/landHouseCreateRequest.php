<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class landHouseCreateRequest extends FormRequest
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
            'title' =>  'required',
            'township' => 'required',
            // 'street_name' => 'required',
            // 'type_of_street' => 'required',
            // 'ward' => 'required',
            'building_name' => 'required_if:property_category,==,7',

            /* AreaSize */
            'area_option' => 'required',
            'width' => 'required_if:area_option,==,1',
            'length' => 'required_if:area_option,==,1',
            'area_size' => 'required_if:area_option,==,2',
            'area_unit' => 'required_if:area_option,==,2',
            
            /* partation */
            'partation_type' => 'required_if:property_category,2|required_if:property_category,7',
            'bath_room' => 'required_if:partation_type,==,2',
            'bed_room' => 'required_if:partation_type,==,2',

            /* Supplyment */
            // 'water' => 'required',
            // 'electric' => 'required',

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

            /* image */
            'images' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
            'building_condition.required_if' => 'Building condition is required',
            'year_of_construction.required_if' => 'Year of construction is required',
            'industrial_type.required_if' => 'Industrial Type is required',
            'land_type.required_if' => 'Land Type is required',
            'partation_type.required_if' => 'Partation Type is required',
            'width.required_if' => 'Width is required',
            'length.required_if' => 'Length is required',
            'area_size.required_if' => 'Area Size is required',
            'area_unit.required_if' => 'Area Unit is required',
            'building_name.required' => 'Building name is requred',
            'floor_level.required_if' => 'Floor Level is required',
            'bed_room.required_if' => 'Bed Room is required',
            'bath_room.required_if' => 'Bath Room is required',
            'type_of_building.required_if' => 'Type Of Building is required',
            'shop_type.required_if' => 'Shop Type is required',
            'installment.required_if' => 'Installment is required',
            
            /* Rent Price */
            'price.required_if' => 'Price is required',
            'currency_code.required_if' => 'Currency Code is required',
            'price_by_area.required_if' => 'Price By Area is required',
            'area.required_if' => 'Area is required',
            'minimum_month.required_if' => 'Minimum month is required',
            'rent_pay_type.required_if' => 'Rent Pay Type is required',
            'rent_payby_daily.required_if' => 'Rent Pay by Daily is required',

            /* Sale Price */
            'sale_price.required_if' => 'Sale Price is required',
            'sale_currency_code.required_if' => 'Sale Currency Code is required',
            'sale_price_by_area.required_if' => 'Sale Price By Area is required',
            'sale_area.required_if' => 'Sale Area is required',
        ];
    }
}