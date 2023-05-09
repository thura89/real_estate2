<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class NewProjectList extends JsonResource
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
        // Properties
        $region = $this->region()->first('name');
        $township = $this->township()->first('name');

        // User
        $userRegion = $this->user->region()->first('name');
        $userTownship = $this->user->township()->first('name');

        $image = json_decode($this->images);
        $image = asset(config('const.new_project_img_path')) . '/' . $image[0];
        return [
            'id' => $this->id,
            'title' => Str::limit($this->title, 60, '...'),
            'region' => $region->name ?? '-',
            'township' => $township->name ?? '-',
            'image' => $image ?? '/backend/images/no-image.jpeg',
            'status' => $status,
            'expired_at' => Carbon::parse($this->created_at)->addYear()->format('Y-m-d H:m:s'),
            'user' => [
                'company_name' => $this->user->company_name,
                'name' => $this->user->name ?? null,
                'email' => $this->user->email,
                'id' => $this->user->id,
                'phone' => $this->user->phone ?? null,
                'region' => $userRegion['name'] ?? null,
                'township' => $userTownship['name'] ?? null,
                'address' => Str::limit($this->user->address, 100, '...') ?? null,
                'profile_photo' => $this->user->profile_photo,
            ],
            'created_at' => Carbon::parse($this->created_at)->format('d-m-y H:m:s'),
        ];
    }
}
