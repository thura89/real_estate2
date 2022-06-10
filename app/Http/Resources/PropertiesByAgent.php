<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Http\Resources\PropertiesDataByRelated;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesByAgent extends JsonResource
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
        // return PropertiesDataByRelated::collection($this->properties);
        return [
            'id' =>  $this->id ?? null,
            'name' =>  $this->name ?? null,
            'phone' =>  $this->phone ?? null,
            'other_phone' =>  $this->other_phone ?? null,
            'company_name' =>  $this->company_name ?? null,
            'agent_type' =>  config('const.agent_type')[$this->agent_type] ?? null,
            'profile_photo' =>  $this->profile_photo ?? null,
            'cover_photo' =>  $this->cover_photo ?? null,
            'company_images' => $company_images ?? [],
            'count' => $this->properties ? $this->properties->count() : null,
            'properties' => PropertiesDataByRelated::collection($this->whenLoaded('properties')),
        ];
    }
}
