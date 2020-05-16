<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class About_Us extends Model
{
    protected $table = 'about_us';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = ['Title','Image','ShortDescription','LongDescription'];
}
