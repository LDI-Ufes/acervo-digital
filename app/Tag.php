<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = 'tags';

  public function tag()
  {
    return $this
      ->belongsToMany('App\LearningObject', 'learning_objects_tags')
      ->withTimestamps();
  }

  public function learningObject()
  {
    return $this->belongsTo('App\LearningObject');
  }

}
