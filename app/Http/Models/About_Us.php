<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class About_Us extends Model
{
    protected $table = 'about_us';

    protected $fillable = ['title','image','short_description','long_description'];
}
