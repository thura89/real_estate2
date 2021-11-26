<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetail16 extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [];
        
        /* Address */
        $region = $this->address ? $this->address->region()->first('name') : null;
        $township = $this->address ? $this->address->township()->first('name') : null;
        
        $data['category'] = $this->category; 
        $data['properties_type'] = $this->properties_type; 
        $data['address'] = [
            'street_name' => $this->address ? $this->address->street_name : null,
            'type_of_street' => $this->address ? config('const.type_of_street')[$this->address->type_of_street] : null,
            'ward' => $this->address ? $this->address->ward : null,
            'township' => $township['name'] ?? null,
            'region' => $region['name'] ?? null,
        ];

        /* AreaSize */
        $data['measurement'] = $this->areasize? config('const.area')[$this->areasize->measurement] : null;
        $data['front_area'] = $this->areasize? $this->areasize->front_area : null;
        $data['building_width'] = $this->areasize? $this->areasize->building_width : null;
        $data['building_length'] = $this->areasize? $this->areasize->building_length : null;

        if ($this->category == 1) {
            /* Category 1 */
            $data['fence_width'] = $this->areasize? $this->areasize->fence_width : null;
            $data['fence_length'] = $this->areasize? $this->areasize->fence_length : null;
        }
        if ($this->category == 6) {
            /* Category 2 */
            $data['floor_level'] = $this->areasize? $this->areasize->floor_level : null;
        }

        /* partation */
        $data['partation_type'] = $this->partation ? config('const.partation_type')[$this->partation->type] : null;
        $data['bath_room'] = $this->partation ? $this->partation->bath_room : null;
        $data['bed_room'] = $this->partation ? $this->partation->bed_room : null;
        $data['carpark'] = $this->partation ? $this->partation->carpark : null;

        /* Supplyment */
        $data['water'] = $this->suppliment ? $this->suppliment->water_sys : null;
        $data['electric'] = $this->suppliment ? $this->suppliment->electricity_sys : null;
        $data['note'] = $this->suppliment ? $this->suppliment->note : null;

        /* Situation */
        $data['year_of_construction'] = $this->situation ? $this->situation->year_of_construction : null;
        $data['building_repairing'] = $this->situation ? config('const.building_repairing')[$this->situation->building_repairing] : null;
        $data['building_condition'] = $this->situation ? config('const.building_condition')[$this->situation->building_condition] : null;
        if ($this->category == 1) {
            $data['type_of_building'] = $this->situation ? $this->situation->type_of_building : null;
        }
        if ($this->category == 6) {
            $data['shop_type'] = $this->situation ? config('const.shop_type')[$this->situation->shop_type] : null;
        }
        
        /* Payment */
        $data['purchase_type'] = $this->payment ? config('const.purchase_type')[$this->payment->purchase_type] : null;
        $data['installment'] = $this->payment ? config('const.installment')[$this->payment->installment] : null;

        if ($this->properties_type == 1) {
            /* Sale Price */
            $data['price'] = $this->price ? $this->price->price : null;
            $data['currency_code'] = $this->price ? $this->price->currency_code : null;
            $data['price_by_area'] = $this->price ? $this->price->price_by_area : null;
            $data['area'] = $this->price ? config('const.area')[$this->price->area] : null;
        }
        if ($this->properties_type == 2) {
            /* Rent Price */
            $data['price'] = $this->rentprice ? $this->rentprice->price : null ;
            $data['currency_code'] = $this->rentprice ? $this->rentprice->currency_code : null ;
            $data['price_by_area'] = $this->rentprice ? $this->rentprice->price_by_area : null ;
            $data['area'] = $this->rentprice ? config('const.area')[$this->rentprice->area] : null ;
            $data['minimum_month'] = $this->rentprice ? $this->rentprice->minimum_month : null ;
            $data['rent_pay_type'] = $this->rentprice ? $this->rentprice->rent_pay_type : null ;
            $data['rent_payby_daily'] = $this->rentprice ? $this->rentprice->rent_payby_daily : null ;
        }
        
        if ($this->category == 1) {
            $data['unitAmenity'] = [
                "refrigerator" => $this->unitAmenity->refrigerator ? 1 : 0,
                "washing_machine" => $this->unitAmenity->washing_machine ? 1 : 0,
                "mirowave" => $this->unitAmenity->mirowave ? 1 : 0,
                "gas_or_electric_stove" => $this->unitAmenity->gas_or_electric_stove ? 1 : 0,
                "air_conditioning" => $this->unitAmenity->air_conditioning ? 1 : 0,
                "tv" => $this->unitAmenity->tv ? 1 : 0,
                "cable_satellite" => $this->unitAmenity->cable_satellite ? 1 : 0,
                "internet_wifi" => $this->unitAmenity->internet_wifi ? 1 : 0,
                "water_heater" => $this->unitAmenity->water_heater ? 1 : 0,
                "security_cctv" => $this->unitAmenity->security_cctv ? 1 : 0,
                "fire_alarm" => $this->unitAmenity->fire_alarm ? 1 : 0,
                "dinning_table" => $this->unitAmenity->dinning_table ? 1 : 0,
                "bed" => $this->unitAmenity->bed ? 1 : 0,
                "sofa_chair" => $this->unitAmenity->sofa_chair ? 1 : 0,
                "private_swimming_pool" => $this->unitAmenity->private_swimming_pool ? 1 : 0,
            ];
        }
        if ($this->category == 6) {
            $data['BuildingAmenity'] = [
                "elevator" => $this->buildingAmenity->elevator ? 1 : 0,
                "garage" => $this->buildingAmenity->garage ? 1 : 0,
                "fitness_center" => $this->buildingAmenity->fitness_center ? 1 : 0,
                "security" => $this->buildingAmenity->security ? 1 : 0,
                "swimming_pool" => $this->buildingAmenity->swimming_pool ? 1 : 0,
                "spa_hot_tub" => $this->buildingAmenity->spa_hot_tub ? 1 : 0,
                "playground" => $this->buildingAmenity->playground ? 1 : 0,
                "garden" => $this->buildingAmenity->garden ? 1 : 0,
                "carpark" => $this->buildingAmenity->carpark ? 1 : 0,
                "own_transformer" => $this->buildingAmenity->own_transformer ? 1 : 0,
                "disposal" => $this->buildingAmenity->disposal ? 1 : 0,
            ];
        }
        /* Get Image */
        if ($this->propertyImage) {
            $img_data = $this->propertyImage()->first('images');
            $decode_images = json_decode($img_data['images']);
            $images = [];
            foreach ($decode_images as $key => $image) {
                $images[] = asset(config('const.p_img_path')) . '/' . $image;
            }
            $data['images'] = $images;    
        }
        /* User */

        $data['author'] = [
            'id' => $this->user ? $this->user->id : null,
            'name' => $this->user ? $this->user->name : null,
            'company_name' => $this->user ? $this->user->company_name : null,
            'user_type' => $this->user ? config('const.user_type')[$this->user->user_type] : null,
            'profile_photo' => $this->user ? $this->user->profile_photo : null,
            'cover_photo' => $this->user ? $this->user->cover_photo : null,
        ];
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        return $data;
    }
}
