<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Durations extends Model
{
    protected $table = 'durations';
    protected $primaryKey = 'id';

    public function SubscriptionPlan(){
        return $this->belongsTo('App\Http\Models\SubscriptionPlan','Duration_id','id');
    }
}
