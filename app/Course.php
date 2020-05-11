<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	use Sluggable;
	protected $table = "courses";

  // the use of a plural name here has to be thought about
  // they mix plural and singular in the laracast course
  // should i do the same? should i avoid it?
	public function learning_objects() 
	{
		return $this
      ->belongsToMany('App\LearningObject', 'courses_learning_objects')
      ->withTimestamps();
	}

	public function type()
	{
		return $this->belongsTo('App\CourseType');
	}

	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}

}
