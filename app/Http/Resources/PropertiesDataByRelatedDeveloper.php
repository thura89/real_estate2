<?php

namespace App\Http\Resources;

use App\WishList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesDataByRelatedDeveloper extends JsonResource
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
        
        $data['id'] = $this->id;
        $data['title'] = $this->title;
        $data['image'] = $image ?? '/backend/images/no-image.jpeg';
        $data['price'] = $price;
        $data['street_name'] = $this->address->street_name ?? null;
        $data['township'] = $township['name'] ?? null;
        $data['properties_type'] = config('const.property_type')[$this->properties_type];
        $data['category'] = config('const.property_category')[$this->category];
        $data['bed_room'] = $this->partation->bed_room ?? null;
        $data['bath_room'] = $this->partation->bath_room ?? null;
        // $data['carpark'] = $this->partation->carpark ?? null;
        if (Auth::guard('api')->check()) {
            $favorite = WishList::where('user_id',Auth::guard('api')->user()->id)->where('property_id',$this->id)->first();
            if ($favorite) {
                $data['favorite_status'] = $favorite->id;
            }else{
                $data['favorite_status'] = 0;
            }
        }
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        return $data;
        
    }
}
