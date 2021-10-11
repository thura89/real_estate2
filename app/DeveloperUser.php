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

    public function developer_profile_imgpath()
    {
        if ($this->images) {
            return asset(('storage/developer/' . $this->images));
        }
        return null;
    }
    public function getProfile_imgAttribute($value)
    {
        if ($value) {
            return asset('storage/developer/' . $value);
        } else {
            return asset('images/profile/no-image.png');
        }
    }
}
