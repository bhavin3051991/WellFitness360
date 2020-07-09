<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $table = 'subscription_plan';
    protected $primaryKey = 'id';

    public function Duration(){
        return $this->hasOne('App\Http\Models\Durations','id','Duration_id');
    }
}
