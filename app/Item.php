<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable = [
    'name','price','stock','status','category','buy_item'
  ];

  public function itemStock()
  {
    return $this->hasOne('App\ItemStock');
  }

  public function like_users()
  {
    return $this->belongsToMany(User::class,'likes', 'item_id', 'user_id')->withTimestamps();
  }

  public function like()
  {
    return $this->hasOne('App\Like', 'item_id');
  }

  public function item_manage() {
    return $this->hasOne('App\ItemManage');
  }

}
