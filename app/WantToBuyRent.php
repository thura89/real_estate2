<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WantToBuyRent extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class,'region','id');
    }
    public function township()
    {
        return $this->belongsTo(Township::class,'township','id');
    }
    /* Agent User */
    public function agentUser()
    {
        return $this->belongsTo(AgentUser::class, 'agent_id', 'id');
    }
    /* Admin User */
    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class, 'admin_id', 'id');
    }

    public function setTerms_ConditionAttribute($value)
    {
        $this->attributes['terms_condition'] = $value ? 1 : 0;
    }
}
