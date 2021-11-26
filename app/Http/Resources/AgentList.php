<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentList extends JsonResource
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
            'email' =>  $this->email ?? null,
            'phone' =>  $this->phone ?? null,
            'agent_type' =>  config('const.agent_type')[$this->agent_type] ?? null,
            'profile_photo' =>  $this->profile_photo ?? null,
            'cover_photo' =>  $this->cover_photo ?? null,
            'post_count' => $this->properties ? $this->properties->count() : null,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
        
    }
}
