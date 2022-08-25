<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];

    /* Address Relation 1 to 1 */
    public function address()
    {
        return $this->hasOne(Address::class, 'properties_id', 'id');
    }
    /* Areasize Relation 1 to 1 */
    public function areasize()
    {
        return $this->hasOne(AreaSize::class, 'properties_id', 'id');
    }
    /* Partation Relation 1 to 1 */
    public function partation()
    {
        return $this->hasOne(Partation::class, 'properties_id', 'id');
    }
    /* Payment Relation 1 to 1 */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'properties_id', 'id');
    }
    /* Sale price Relation 1 to 1 */
    public function price()
    {
        return $this->hasOne(Price::class, 'properties_id', 'id');
    }
    /* Rent price Relation 1 to 1 */
    public function rentprice()
    {
        return $this->hasOne(RentPrice::class, 'properties_id', 'id');
    }
    /* propertyImage Relation 1 to 1 */
    public function propertyImage()
    {
        return $this->hasOne(PropertyImage::class, 'properties_id', 'id');
    }
    /* situation Relation 1 to 1 */
    public function situation()
    {
        return $this->hasOne(Situation::class, 'properties_id', 'id');
    }
    /* suppliment Relation 1 to 1 */
    public function suppliment()
    {
        return $this->hasOne(Suppliment::class, 'properties_id', 'id');
    }
    /* unitAmenity Relation 1 to 1 */
    public function unitAmenity()
    {
        return $this->hasOne(UnitAmenity::class, 'properties_id', 'id');
    }
    /* BuildingAmenity Relation 1 to 1 */
    public function buildingAmenity()
    {
        return $this->hasOne(BuildingAmenity::class, 'properties_id', 'id');
    }
    /* LotFeature Relation 1 to 1 */
    public function lotFeature()
    {
        return $this->hasOne(LotFeature::class, 'properties_id', 'id');
    }
    /* Agent User */
    public function agentUser()
    {
        return $this->belongsTo(AgentUser::class, 'agent_id', 'id');
    }
    /* User */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /* WishList */
    public function wishlist()
    {
        return $this->hasMany(WishList::class);
    }


    public function scopeCreated_at($query)
    {
        return $query->where(Carbon::now()->diffInDays('created_at') >= 365);
    }
}
