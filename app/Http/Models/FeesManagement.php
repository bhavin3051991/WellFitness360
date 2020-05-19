<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class FeesManagement extends Model
{
    protected $table = 'feesmanagement';
    protected $primaryKey = 'ID';
    protected $html = '';



    // Relationship one to one Get Trainer
    public function Trainer()
    {
        return $this->hasOne('App\User','id','TrainerID');
    }
}
