<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LearningObject extends Model
{
	protected $table = "learning_objects";

	public function course()
	{
		return $this
      ->belongsToMany('App\Course', 'courses_learning_objects')
      ->withTimestamps();
	}

	public function type()
	{
		return $this->belongsTo('App\ObjectType');
	}
}
