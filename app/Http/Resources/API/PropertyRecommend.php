<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyRecommend extends JsonResource
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
            $price =  $this->price ? number_format($this->price->price) .' '. $currency_code  : '0';
        }
        /* Buy properties_type => 0 */
        if ($this->properties_type == 2) {
            $rent_currency_code = $this->rentprice->currency_code ? config('const.currency_code')[$this->rentprice->currency_code] : '';
            $price = $this->rentprice ? number_format($this->rentprice->price) .' '. $rent_currency_code : '0';
        }
        /* township */
        $township = $this->address ? $this->address->township()->first('name') : null;
        return [
            'id' => $this->id,
            'image' => $image ?? '/backend/images/no-image.jpeg',
            'title' => $this->title,
            'p_code' => $this->p_code,
            'price' => $price,
            'street_name' => $this->address->street_name ?? null,
            'township' => $township['name'] ?? null,
            'property_type' => config('const.property_type')[$this->properties_type],
            'category' => config('const.property_category')[$this->category],
            'bed_room' => $this->partation->bed_room ?? null,
            'bath_room' => $this->partation->bath_room ?? null,
            'carpark' => $this->partation->carpark ?? null,
            'recommended_feature' => $this->status,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:m:s'),
        ];
    }
}
