<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentByProperties extends JsonResource
{
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>  $this->id ?? null,
            'name' =>  $this->name ?? null,
            'company_name' =>  $this->company_name ?? null,
            'agent_type' =>  config('const.agent_type')[$this->agent_type] ?? null,
            'profile_photo' =>  $this->profile_photo ?? null,
            'cover_photo' =>  $this->cover_photo ?? null,
            'description' =>  $this->description ?? null,
            'count' => $this->properties->count() ?? null,
            'properties' => PropertiesDataByRelated::collection($this->whenLoaded('properties')),
        ];
    }
}
