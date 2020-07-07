<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategories extends Model
{
    use SoftDeletes;
    protected $table = 'subcategories';
    protected $primaryKey = 'ID';

    public function Categories(){
    	return $this->hasOne('App\Http\Models\Categories','ID','cat_id');
    }
}
