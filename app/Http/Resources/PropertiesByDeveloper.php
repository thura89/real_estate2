<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertiesDataByRelatedDeveloper;

class PropertiesByDeveloper extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return PropertiesDataByRelated::collection($this->properties);
        return [
            'id' =>  $this->id ?? null,
            'name' =>  $this->name ?? null,
            'company_name' =>  $this->company_name ?? null,
            'profile_photo' =>  $this->profile_photo ?? null,
            'cover_photo' =>  $this->cover_photo ?? null,
            'count' => $this->properties ? $this->properties->count() : null,
            'properties' => PropertiesDataByRelatedDeveloper::collection($this->whenLoaded('properties')),
        ];
    }
}
