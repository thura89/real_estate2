<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /* Admin User */
    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class, 'post_by', 'id');
    }
    // public function getImagesAttribute($value)
    // {
    //     if ($value) {
    //         return asset('storage/news/' . $value);
    //     } else {
    //         return asset('images/profile/no-image.png');
    //     }
    // }
    // public function setImagesAttribute($value)
    // {
    //     $this->attributes['images'] = $value;
    // }
}
