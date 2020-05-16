<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    protected $table = 'contact_us';
    protected $primaryKey = 'ID';
    public $timestamps = false;
    protected $fillable = ['Email','ContactNumber','Address','Telephone','Website','Description'];
}
