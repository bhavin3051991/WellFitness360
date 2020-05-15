<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    protected $table = 'contact_us';

    protected $fillable = ['email','contact_number','address','telephone','website','description'];
}
