<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	protected $table = 'module';

	protected $fillable = ['name','display_name'];

	

	public function getModule($id = null){
		$Module = new static();
		if($id){
			$result = $Module->select('*')
			->where('id',$id)
			->first()
			->toArray();
		}else{
			$result = $Module->select('*')
			->get()
			->toArray();
		}
		if($result){
			return $result;
		}else{
			return false;
		}
	}

}
