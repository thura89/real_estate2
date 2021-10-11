<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AgentUser extends Authenticatable
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
        return $this->hasMany('App\Property', 'agent_id', 'id');
    }

    public function agent_profile_imgpath()
    {
        if ($this->images) {
            return asset(('storage/agent/' . $this->images));
        }
        return null;
    }
    public function getImagesAttribute($value)
    {
        if ($value) {
            return asset('storage/agent/' . $value);
        } else {
            return asset('images/profile/no-image.png');
        }
    }
}
