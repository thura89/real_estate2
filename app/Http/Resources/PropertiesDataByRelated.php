<?php

namespace App\Http\Resources;

use App\WishList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesDataByRelated extends JsonResource
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

        if ($this->price) {
            $currency_code = $this->price->currency_code ? config('const.currency_code')[$this->price->currency_code] : '';
            $price =  $this->price ? number_format($this->price->price) . ' ' . $currency_code  : '0';
        } else {
            $price = null;
        }

        /* township */
        $township = $this->address ? $this->address->township()->first('name') : null;

        /* Region */
        $region = $this->address ? $this->address->region()->first('name') : null;

        /* AreaSize */
        if ($this->areasize) {
            if ($this->areasize->area_option != NULL) {
                if ($this->areasize->area_option == 1) {
                    $area_size =  $this->areasize->width . ' x ' . $this->areasize->length;
                }
                if ($this->areasize->area_option == 2) {
                    if ($this->areasize->area_unit > 2) {
                        $area_size =  $this->areasize->area_size . ' ' . '-';
                    } else {
                        $area_size =  $this->areasize->area_size . ' ' . config('const.area_short')[$this->areasize->area_unit];
                    }
                }
            }
        }

        $data['id'] = $this->id;
        $data['user'] = $this->user_id;
        $data['title'] = $this->title;
        $data['image'] = $image ?? '/backend/images/no-image.jpeg';
        $data['price'] = $price ?? null;
        $data['township'] = $township['name'] ?? null;
        $data['region'] = $region['name'] ?? null;
        $data['properties_type'] = config('const.property_type')[$this->properties_type];
        $data['category'] = config('const.property_category')[$this->category];
        $data['bed_room'] = $this->partation->bed_room ?? null;
        $data['bath_room'] = $this->partation->bath_room ?? null;
        $data['area_size'] = $area_size ?? null;
        if (Auth::guard('api')->check()) {
            $favorite = WishList::where('user_id', Auth::guard('api')->user()->id)->where('property_id', $this->id)->first();
            if ($favorite) {
                $data['favorite_status'] = $favorite->id;
            } else {
                $data['favorite_status'] = 0;
            }
        }
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        return $data;
    }
}