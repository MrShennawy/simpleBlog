<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected  $table = 'blogs';
    protected $fillable = ['user_id', 'cat_id', 'title', 'content'];

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function Cat()
    {
        return $this->belongsTo('App\Category', 'cat_id');
    }

    public function Comments()
    {
        return $this->hasMany('App\Comment','blog_id');
    }
}
