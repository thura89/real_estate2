<?php

namespace App\Http\Resources;

use App\WishList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyList extends JsonResource
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
        $image = $this->propertyImage()->first('images');
        $image = json_decode($image['images']);
        $image = asset(config('const.p_img_path')) . '/' . $image[0];
        
        /* Buy properties_type => 1 */
        if ($this->properties_type == 1) {
            $currency_code = $this->price->currency_code ? config('const.currency_code')[$this->price->currency_code] : '';
            $price =  $this->price ? number_format($this->price->price) .' '. $currency_code  : '0';
        }
        /* Buy properties_type => 0 */
        if ($this->properties_type == 2) {
            $rent_currency_code = $this->rentprice->currency_code ? config('const.currency_code')[$this->rentprice->currency_code] : '';
            $price = $this->rentprice ? number_format($this->rentprice->price) .' '. $rent_currency_code : '0';
        }
        /* township */
        $township = $this->address ? $this->address->township()->first('name') : null;
        /** Region */
        $region = $this->address ? $this->address->region()->first('name') : null;

        /* AreaSize */
        if ($this->areasize) {
            if ($this->areasize->area_option != NULL) {
                if ($this->areasize->area_option == 1) {
                    $area_size =  $this->areasize->width .' x '. $this->areasize->length;
                } 
                if ($this->areasize->area_option == 2) {
                    $area_size =  $this->areasize->area_size .' '. config('const.area_short')[$this->areasize->area_unit];
                }
            }
        }else{
            $area_size = NULL;
        }
        
        $data['id'] = $this->id;
        $data['image'] = $image ?? '/backend/images/no-image.jpeg';
        $data['title'] = $this->title;
        $data['price'] = $price;
        $data['township'] = $township['name'] ?? null;
        $data['region'] = $region['name'] ?? null;
        $data['property_type'] = config('const.property_type')[$this->properties_type];
        $data['category'] = config('const.property_category')[$this->category];
        $data['bed_room'] = $this->partation->bed_room ?? null;
        $data['bath_room'] = $this->partation->bath_room ?? null;
        $data['note'] = $this->suppliment->note ?? null;
        $data['area_size'] = $area_size ?? null;
        $data['recommended_feature'] = $this->status;
        if (Auth::guard('api')->check()) {
            $favorite = WishList::where('user_id',Auth::guard('api')->user()->id)->where('property_id',$this->id)->first();
            if ($favorite) {
                $data['favorite_status'] = 1;
            }else{
                $data['favorite_status'] = 0;
            }
        }
        $data['user'] = [
            'profile_photo' => $this->user->profile_photo ?? null,
            'company_name' => $this->user->company_name ?? null
        ];
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        return $data;
        
    }
}
