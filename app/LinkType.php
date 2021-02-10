<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkType extends Model
{
  protected $table = 'link_types';

  public function links()
  {
    return $this->hasMany('App\Link');
  }
}
