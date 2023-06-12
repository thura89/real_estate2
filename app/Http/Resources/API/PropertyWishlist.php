<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyWishlist extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $image = $this->propertyImage()->first('images');
        $image = json_decode($image['images']);
        $image = asset(config('const.p_img_path')) . '/' . $image[0];
        
        /* Buy properties_type => 1 */
        if ($this->properties_type == 1) {
            $currency_code = $this->price->currency_code ? config('const.currency_code')[$this->price->currency_code] : '';
            $price = $this->price ? number_format($this->price->price) .' '. $currency_code  : '0';
        }
        /* Buy properties_type => 0 */
        if ($this->properties_type == 2) {
            $rent_currency_code = $this->rentprice->currency_code ? config('const.currency_code')[$this->rentprice->currency_code] : '';
            $price = $this->rentprice ? number_format($this->rentprice->price) .' '. $rent_currency_code : '0';
        }
        /* township */
        $township = $this->address ? $this->address->township()->first('name') : null;

        /* wishlist splice */
        $wishlist = $this->wishlist()->first('id');

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
        
        return [
            'wishlist_id' => $wishlist->id ?? null,
            'property_id' => $this->id,
            'image' => $image ?? '/backend/images/no-image.jpeg',
            'title' => $this->title,
            'price' => $price,
            'street_name' => $this->address->street_name ?? null,
            'township' => $township['name'] ?? null,
            'category' => config('const.property_category')[$this->category],
            'bed_room' => $this->partation->bed_room ?? null,
            'bath_room' => $this->partation->bath_room ?? null,
            'area_size' => $area_size,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:m:s'),
        ];
    }
}
