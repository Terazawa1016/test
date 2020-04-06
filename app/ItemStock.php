<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
  protected $fillable = [
    'stock', 'item_id'
  ];

  public function item()
  {
    return $this->belongsTo('App\Item');
  }
}
