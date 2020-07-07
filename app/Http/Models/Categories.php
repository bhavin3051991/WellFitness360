<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $primaryKey = 'ID';

    public function Subcategories()
    {
        return $this->belongsTo('App\Http\Models\Subcategories', 'cat_id','ID');
    }
}
