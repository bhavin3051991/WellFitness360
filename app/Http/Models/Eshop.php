<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eshop extends Model
{
	use SoftDeletes;
    protected $table = 'e-shop';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = ['Name','Description','Image','Shop_URL','Status'];
}
