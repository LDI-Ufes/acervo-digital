<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningObject extends Model
{
	protected $table = "learning_objects";

	public function course()
	{
		return $this->belongsTo('App\Course');
	}

	public function type()
	{
		return $this->belongsTo('App\ObjectType');
	}
}
