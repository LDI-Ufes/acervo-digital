<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	protected $table = "courses";

	public function learning_objects()
	{
		return $this->hasMany('App\LearningObject');
	}

	public function type()
	{
		return $this->belongsTo('App\CourseType');
	}

}
