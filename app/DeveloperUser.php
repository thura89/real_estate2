<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DeveloperUser extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function properties()
    {
        return $this->hasMany('App\Property', 'developer_id', 'id');
    }

    public function developer_profile_imgpath($value)
    {
        if ($value) {
            return asset('storage/developer/' . $value .'hello');
        } else {
            return asset('images/profile/no-image.png');
        }
    }
    public function getProfileImgAttribute($value)
    {
        if ($value) {
            return asset('storage/developer/' . $value .'hello');
        } else {
            return asset('images/profile/no-image.png');
        }
    }
}
