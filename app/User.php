<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    // protected $appends = [
    //     'profile_photo_url',
    // ];

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
        return $this->hasMany(Property::class, 'user_id', 'id');
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
                     ->with([$relation => $constraint]);
    }

    public function wantToBuyRents()
    {
        return $this->hasMany(WantToBuyRent::class, 'user_id', 'id');
    }

    public function news()
    {
        return $this->hasMany('App\News', 'post_by', 'id');
    }

    public function getProfilePhotoAttribute($value)
    {
        if ($value) {
            return asset('/storage/profile/' . $value);
        } else {
            return asset('https://ui-avatars.com/api/?background=0D8ABC&color=fff&name='.str_replace(' ', '+', $this->name));
        }
    }
    public function getCoverPhotoAttribute($value)
    {
        if ($value) {
            return asset('/storage/cover/' . $value);
        } else {
            return asset('https://ui-avatars.com/api/?background=0D8ABC&color=fff&name='.str_replace(' ', '+', $this->name));
        }
    }
}
