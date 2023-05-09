<?php

namespace App\Http\Resources\API;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNewProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->status == null || $this->status == 0) {
            $status = 0;
        } else {
            $status = 1;
        }
        /** Project region */
        $region = $this->region()->first('name');
        $township = $this->township()->first('name');

        /** User Region */
        $userRegion = $this->user->region()->first('name');
        $userTownship = $this->user->township()->first('name');

        $decode_images = json_decode($this->images);
        $images = [];
        foreach ($decode_images as $key => $image) {
            $images[] = asset(config('const.new_project_img_path')) . '/' . $image;
        }
        $images = $images ?? null;

        return [
            'id' => $this->id,
            'title' => $this->title,
            'region' => $region->name ?? null,
            'township' => $township->name ?? null,
            'about_project' => $this->about_project,
            'images' => $images ?? [],
            'status' => $status,
            'user' => [
                'id' => $this->user->id ?? null,
                'name' => $this->user->name ?? null,
                'company_name' => $this->user->company_name ?? null,
                'profile_photo' => $this->user->profile_photo ?? null,
                'phone' => $this->user->phone ?? null,
                'region' => $userRegion['name'] ?? null,
                'township' => $userTownship['name'] ?? null,
                'address' => $this->user->address ?? null,
            ],
            'expired_at' => Carbon::parse($this->created_at)->addYear()->format('Y-m-d H:m:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-y H:m:s'),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}
