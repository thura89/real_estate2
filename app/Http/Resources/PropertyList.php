<?php

namespace App\Http\Resources;

use App\WishList;
use Carbon\Carbon;
use Illuminate\Support\Str;
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

        // return $this->price;
        $data = [];
        $image = $this->propertyImage()->first('images');
        $image = json_decode($image['images']);
        $image = asset(config('const.p_img_path')) . '/' . $image[0];

        /* Price */
        if ($this->price) {
            $currency_code = $this->price->currency_code ? config('const.currency_code')[$this->price->currency_code] : '';
            $price =  $this->price ? number_format($this->price->price) . ' ' . $currency_code  : '0';
        } else {
            $price = null;
        }


        /* township */
        $township = $this->address ? $this->address->township()->first('name') : null;
        /** Region */
        $region = $this->address ? $this->address->region()->first('name') : null;

        /* User */
        $userregion = $this->user ? $this->user->region()->first('name') : null;
        $usertownship = $this->user ? $this->user->township()->first('name') : null;

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
        $data['image'] = $image ?? '/backend/images/no-image.jpeg';
        $data['title'] = $this->title;
        $data['price'] = $price ?? null;
        $data['township'] = $township['name'] ?? null;
        $data['region'] = $region['name'] ?? null;
        $data['property_type'] = config('const.property_type')[$this->properties_type];
        $data['category'] = config('const.property_category')[$this->category];
        $data['bed_room'] = $this->partation->bed_room ?? null;
        $data['bath_room'] = $this->partation->bath_room ?? null;
        $data['note'] = $this->suppliment ? Str::limit($this->suppliment->note, 50, '...') : null;
        $data['area_size'] = $area_size ?? null;

        if ($this->category == 3 || $this->category == 4 || $this->category == 6 || $this->category == 8) {
            $data['floor_level'] = $this->areasize ? $this->areasize->level : null;
        }

        $data['recommended_feature'] = (string)$this->recommended_feature;
        if (Auth::guard('api')->check()) {
            $favorite = WishList::where('user_id', Auth::guard('api')->user()->id)->where('property_id', $this->id)->first();
            if ($favorite) {
                $data['favorite_status'] = (string)$favorite->id;
            } else {
                $data['favorite_status'] = '0';
            }
        }

        $data['region'] =  $region['name'] ?? null;
        $data['township'] =  $township['name'] ?? null;


        $data['user'] = [
            'id' => $this->user->id ?? null,
            'name' => $this->user->name ?? null,
            'company_name' => $this->user->company_name ?? null,
            'phone' => $this->user->phone ?? null,
            'other_phone' => $this->user->other_phone ?? null,
            'region' => $userregion['name'] ?? null,
            'township' => $usertownship['name'] ?? null,
            'address' => $this->user->address ?? null,
            'user_type' => $this->user->user_type ?? null,
            'post_count' => $this->user->properties ? $this->user->properties->count() : '0',
            'profile_photo' => $this->user->profile_photo ?? null,
            'cover_photo' => $this->user->cover_photo ?? null,

        ];
        $data['status'] = $this->status;
        $data['expired_at'] = Carbon::parse($this->created_at)->addYear()->format('Y-m-d H:m:s');
        $data['created_at'] = Carbon::parse($this->created_at)->format('Y-m-d H:m:s');
        return $data;
    }
}
