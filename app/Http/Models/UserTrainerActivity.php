<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserTrainerActivity extends Model
{
    protected $table = 'user_trainer_activity';
    protected $primaryKey = 'id';
    protected $html = '';
    public $timestamps = false;
}
