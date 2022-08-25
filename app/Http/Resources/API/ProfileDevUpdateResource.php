<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileDevUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->company_images) {
            $company_images = [];
            foreach ($this->company_images as $key => $image) {
                $company_images[] = asset(config('const.company_images')) . '/' .$image;
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'user_type' => $this->user_type,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'description' => $this->description,
            'profile_photo' => $this->profile_photo,
            'cover_photo' => $this->cover_photo,
            'company_images' => $company_images ?? [],
        ];
    }
}
