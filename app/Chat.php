<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  protected $fillable = ['name', 'comment','favorite_id'];

  public function favorite()
  {
    return $this->belongsTo('App\Favorite');
  }
}
