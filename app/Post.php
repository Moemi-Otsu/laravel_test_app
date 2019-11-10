<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    // Userに従属
    public function user() //単数形
    {
        return $this->belongsTo('App\User');
    }

    // Commentを従属させる
    public function comments() //複数形
    {
        return $this->hasMany('App\Comment');
    }
}
