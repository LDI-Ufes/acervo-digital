<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	use Sluggable;
	protected $table = "courses";

	public function learning_objects()
	{
		return $this->hasMany('App\LearningObject');
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
