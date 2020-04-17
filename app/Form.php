<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
  protected $fillable = [
    'user_id','name','comment'
  ];

  public function User() {
    return $this->belongsTo('App\User');
  }
}
