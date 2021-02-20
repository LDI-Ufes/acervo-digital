<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  protected $table = 'links';

  public function type()
  {
    return $this->belongsTo('App\LinkType', 'link_type_id', 'id');
  }
  
  public function learning_object() 
  {
    return $this->belongsTo('App\LearningObject');
  } 
}
