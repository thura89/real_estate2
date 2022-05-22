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
        'name', 'email', 'password', 'facebook_id', 'google_id', 'apple_id'
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
        'company_images' => 'array',
        'phone' => 'array',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'user_id', 'id');
    }
    public function newprojects()
    {
        return $this->hasMany(NewProject::class, 'user_id', 'id');
    }
    
    public function scopeWithAndWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }

    public function wantToBuyRents()
    {
        return $this->hasMany(WantToBuyRent::class, 'user_id', 'id');
    }

    /* News */
    public function news()
    {
        return $this->hasMany('App\News', 'post_by', 'id');
    }

    /* Product Wishlist / Favorite List */
    public function wishlist()
    {
        return $this->hasMany(WishList::class);
    }

    public function property_wishlist()
    {
        return $this->hasMany(Property::class);
    }

    public function getProfilePhotoAttribute($value)
    {
        if ($value) {
            return asset('/storage/profile/' . $value);
        } else {
            return asset('https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=' . str_replace(' ', '+', $this->name));
        }
    }
    public function getCoverPhotoAttribute($value)
    {
        if ($value) {
            return asset('/storage/cover/' . $value);
        } else {
            return asset('/backend/images/timemyay_default_cover.png');
        }
    }

    /* User Follower */
    public function follow(User $user)
    {
        if (!$this->isFollowing($user)) {
            Follow::create([
                'user_id' => auth()->id(),
                'following_id' => $user->id
            ]);
        }
    }
    
    public function unfollow(User $user)
    {
        Follow::where('user_id', auth()->id())->where('following_id', $user->id)->delete();
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('users.id', $user->id)->exists();
    }

    public function following()
    {
        return $this->hasManyThrough(User::class, Follow::class, 'user_id', 'id', 'id', 'following_id');
    }

    public function followers()
    {
        return $this->hasManyThrough(User::class, Follow::class, 'following_id', 'id', 'id', 'user_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class,'region','id');
    }
    public function township()
    {
        return $this->belongsTo(Township::class,'township','id');
    }
}
