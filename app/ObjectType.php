<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectType extends Model
{
	protected $table = "object_types";
	public function learning_objects()
	{
		return $this->hasMany('App\LearningObject');
	}

}
