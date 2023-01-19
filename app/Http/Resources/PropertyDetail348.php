<?php

namespace App\Http\Resources;

use App\WishList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetail348 extends JsonResource
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
        
        /** Area Size */
        if ($this->areasize->area_option == 1) {
            $data_area_size = [
                'area_option' => $this->areasize? $this->areasize->area_option : null,
                'width' => $this->areasize? $this->areasize->width : null,
                'length' => $this->areasize? $this->areasize->length : null,
            ];
        } else {
            $data_area_size = [
                'area_option' => $this->areasize? $this->areasize->area_option : null,
                'area_size' => $this->areasize? $this->areasize->area_size : null,
                'area_unit' => $this->areasize? $this->areasize->area_unit : null,
            ];
        }

        /* Address */
        $region = $this->address ? $this->address->region : null;
        $township = $this->address ? $this->address->township : null;
        
        $data['category'] = (string)$this->category; 
        $data['properties_type'] = (string)$this->properties_type; 
        $data['p_code'] = (string)$this->p_code;
        $data['title'] = $this->title; 
        $data['address'] = [
            'street_name' => $this->address ? $this->address->street_name : null,
            'type_of_street' => $this->address ? (string)$this->address->type_of_street : null,
            'ward' => $this->address ? $this->address->ward : null,
            'township' => (string)$township ?? null,
            'region' => (string)$region ?? null,
            'building_name' => $this->address ? $this->address->building_name : null,
        ];

        /* AreaSize */
        $data['area_size'] = $data_area_size;
        if ($this->category == 6) {
            $data['floor_level'] = $this->areasize? (string)$this->areasize->floor_level : null;
        }

        /* partation */
        $data['partation_type'] = $this->partation ? (string)$this->partation->type : null;
        $data['bath_room'] = $this->partation ? (string)$this->partation->bath_room : null;
        $data['bed_room'] = $this->partation ? (string)$this->partation->bed_room : null;
        // $data['carpark'] = $this->partation ? $this->partation->carpark : null;

        /* Payment */
        $data['purchase_type'] = $this->payment ? (string)$this->payment->purchase_type : null;
        $data['installment'] = $this->payment ? (string)$this->payment->installment : null;
        
        if ($this->properties_type == 1) {
            /* Sale Price */
            $data['price'] = $this->price ? (string)$this->price->price : null;
            $data['currency_code'] = $this->price ? $this->price->currency_code : null;
            $data['price_by_area'] = $this->price ? (string)$this->price->price_by_area : null;
            $data['area'] = $this->price ? (string)$this->price->area : null;
        }
        if ($this->properties_type == 2) {
            /* Rent Price */
            $data['price'] = $this->rentprice ? (string)$this->rentprice->price : null ;
            $data['currency_code'] = $this->rentprice ? $this->rentprice->currency_code : null ;
            $data['price_by_area'] = $this->rentprice ? (string)$this->rentprice->price_by_area : null ;
            $data['area'] = $this->rentprice ? (string)$this->rentprice->area : null ;
            $data['minimum_month'] = $this->rentprice ? (string)$this->rentprice->minimum_month : null ;
            $data['rent_pay_type'] = $this->rentprice ? (string)$this->rentprice->rent_pay_type : null ;
            $data['rent_payby_daily'] = $this->rentprice ? (string)$this->rentprice->rent_payby_daily : null ;
        }

        /* Situation */
        $data['year_of_construction'] = $this->situation ? (string)$this->situation->year_of_construction : null;
        $data['building_repairing'] = $this->situation ? (string)$this->situation->building_repairing : null;
        $data['building_condition'] = $this->situation ? (string)$this->situation->building_condition : null;

        /* Supplyment */
        // $data['water'] = $this->suppliment ? $this->suppliment->water_sys : null;
        // $data['electric'] = $this->suppliment ? $this->suppliment->electricity_sys : null;
        $data['note'] = $this->suppliment ? $this->suppliment->note : null;
        
        /* unitAmenity */
        $unit_amenity = config('const.unit_amenity');
        foreach ($unit_amenity as $key => $unit) {
            if ($this->unitAmenity->$unit == 1) {
                $units[] = $unit;
            }
        }
        $data['unitAmenity'] = $units ?? null;
    
        /* BuildingAmenity */
        $building_amenity = config('const.building_amenity');
        foreach ($building_amenity as $key => $building) {
            if ($this->buildingAmenity->$building == 1) {
                $buildings[] = $building;
            }
        }
        $data['BuildingAmenity'] = $buildings ?? null;
        

        /* Lot Feature */
        $lot_feature = config('const.lot_feature');
        foreach ($lot_feature as $key => $lot) {
            if ($this->lotFeature->$lot == 1) {
                $lots[] = $lot;
            }
        }
        $data['lotFeature'] = $lots ?? null;

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
        
        if (Auth::guard('api')->check()) {
            $favorite = WishList::where('user_id',Auth::guard('api')->user()->id)->where('property_id',$this->id)->first();
            if ($favorite) {
                $data['favorite_status'] = (string)$favorite->id;
            }else{
                $data['favorite_status'] = '0';
            }
        }
        /* User */

        $data['user'] = [
            'id' => (string)$this->user->id ?? null,
            'name' => $this->user->name ?? null,
            'phone' => $this->user->phone ?? null,
            'company_name' => $this->user->company_name ?? null,
            'user_type' => (string)$this->user->user_type ?? null,
            'profile_photo' => $this->user->profile_photo ?? null,
            'cover_photo' => $this->user->cover_photo ?? null,
        ];
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        return $data;
    }
}
