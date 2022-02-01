<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsList extends JsonResource
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
            'id' => $this->id,
            "post_title" => $this->post_title,
            "author" => [
                'name' => $this->user ? $this->user->name : null,
                'role' => $this->user ? config('const.role_level')[$this->user->user_type] : null,
                'profile_photo' => $this->user ? $this->user->profile_photo : null,
            ],
            "view_count" => $this->view_count,
            "images" => asset(config('const.news_img_path')) . '/' . $this->images ?? null,
            "post_letter" => Str::limit($this->post_letter, 100, '...'),
            "created_at" => Carbon::parse($this->created_at)->format('Y-m-d H:m:s'),
        ];
    }
}
