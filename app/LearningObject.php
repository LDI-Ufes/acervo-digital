<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class LearningObject extends Model
{
  use Sluggable;
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

  public function tags()
  {
    return $this
      ->belongsToMany('App\Tag', 'learning_objects_tags')
      ->withTimeStamps();
  }

  public function links()
  {
    return $this->hasMany('App\Link');
  }

  public function sluggable()
  {
    return [
    'slug' => [
      'source' => 'title'
      ]
    ];
  }

}
