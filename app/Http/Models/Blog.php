<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
	use SoftDeletes;
	protected $table = 'blog';
	protected $primaryKey = 'id';
	protected $html = '';
}