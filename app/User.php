<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function likes()
    {
        return $this->belongsToMany(Item::class, 'likes', 'user_id', 'item_id')->withTimestamps();
    }

    public function like($item_id)
    {
        $exist = $this->liked($item_id);

        if($exist){
            return false;
        }else{
            $this->likes()->attach($item_id);
            return true;
        }
    }

    public function dislike($item_id)
    {
        $exist = $this->liked($item_id);

        if($exist){
            $this->likes()->detach($item_id);
            return true;
        }else{
            return false;
        }
    }

    public function liked($item_id)
    {
        return $this->likes()->where('item_id',$item_id)->exists();
    }
}
