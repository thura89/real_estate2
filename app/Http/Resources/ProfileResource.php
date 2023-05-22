<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $region = $this->region()->first('name');
        $township = $this->township()->first('name');

        if ($this->company_images) {
            $company_images = [];
            foreach ($this->company_images as $key => $image) {
                $company_images[] = asset(config('const.company_images')) . '/' . $image;
            }
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'user_type' => $this->user_type,
            'agent_type' => $this->agent_type,
            'email' => $this->email,
            'phone' => $this->phone,
            'other_phone' => $this->other_phone ?? [],
            'region' => $region ?? null,
            'township' => $township ?? null,
            'address' => $this->address,
            'description' => $this->description,
            'profile_photo' => $this->profile_photo,
            'cover_photo' => $this->cover_photo,
            'company_images' => $company_images ?? [],
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}
