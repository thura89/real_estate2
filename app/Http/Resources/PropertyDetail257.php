<?php

namespace App\Http\Resources;

use App\WishList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetail257 extends JsonResource
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
        $region = $this->address ? $this->address->region()->first('name') : null;
        $township = $this->address ? $this->address->township()->first('name') : null;
        
        $data['category'] = $this->category; 
        $data['properties_type'] = $this->properties_type; 
        $data['p_code'] = $this->p_code; 
        $data['title'] = $this->title; 
        $data['address'] = [
            'street_name' => $this->address ? $this->address->street_name : null,
            'type_of_street' => $this->address ? config('const.type_of_street')[$this->address->type_of_street] : null,
            'ward' => $this->address ? $this->address->ward : null,
            'township' => $township['name'] ?? null,
            'region' => $region['name'] ?? null,
            'building_name' => $this->address ? $this->address->building_name : null,
        ];
        
        /* AreaSize */
        $data['area_size'] = $data_area_size;
        if ($this->category == 6) {
            $data['floor_level'] = $this->areasize? $this->areasize->floor_level : null;
        }

        /* Category 7 */
        if ($this->category == 7) {
            $data['building_width'] = $this->areasize? $this->areasize->building_width : null;
            $data['building_length'] = $this->areasize? $this->areasize->building_length : null;    
        }

        if ($this->category == 2 || $this->category == 7) {
            /* partation */
            $data['partation_type'] = $this->partation ? config('const.partation_type')[$this->partation->type] : null;
            $data['bath_room'] = $this->partation ? $this->partation->bath_room : null;
            $data['bed_room'] = $this->partation ? $this->partation->bed_room : null;
            // $data['carpark'] = $this->partation ? $this->partation->carpark : null;
        }

        /* Supplyment */
        $data['water'] = $this->suppliment ? $this->suppliment->water_sys : null;
        $data['electric'] = $this->suppliment ? $this->suppliment->electricity_sys : null;
        $data['note'] = $this->suppliment ? $this->suppliment->note : null;

        /* Situation Store */
        $data['building_repairing'] = $this->situation ? $this->situation->building_repairing : null;
        if ($this->category == 2) {
            $data['fence_condition'] = $this->situation ? $this->situation->fence_condition : null;
        }
        if ($this->category == 5) {
            $data['land_type'] = $this->situation ? config('const.land_type')[$this->situation->land_type] : null;
        }
        if ($this->category == 7) {
            $data['year_of_construction'] = $this->situation ? $this->situation->year_of_construction : null;
            $data['industrial_type'] = $this->situation ? config('const.industrial_type')[$this->situation->industrial_type] : null;
            $data['building_condition'] = $this->situation ? config('const.building_condition')[$this->situation->building_condition] : null;
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
                $data['favorite_status'] = 1;
            }else{
                $data['favorite_status'] = 0;
            }
        }
        /* User */

        $data['user'] = [
            'id' => $this->user->id ?? null,
            'name' => $this->user->name ?? null,
            'phone' => $this->user->phone ?? null,
            'company_name' => $this->user->company_name ?? null,
            'user_type' => config('const.user_type')[$this->user->user_type] ?? null,
            'profile_photo' => $this->user->profile_photo ?? null,
            'cover_photo' => $this->user->cover_photo ?? null,
        ];
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        return $data;

    }
}
