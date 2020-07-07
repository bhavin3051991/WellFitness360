<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'about_us';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
