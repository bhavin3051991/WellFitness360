<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeesManagement extends Model
{
	use SoftDeletes;
    protected $table = 'feesmanagement';
    protected $primaryKey = 'ID';
    protected $html = '';



    // Relationship one to one Get Trainer
    public function Trainer()
    {
        return $this->hasOne('App\User','id','TrainerID');
    }
}
