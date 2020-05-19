<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Eshop extends Model
{
    protected $table = 'E-shop';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = ['Name','Description','Image','Shop_URL','Status'];
}
