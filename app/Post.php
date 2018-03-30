<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    
    protected $fillable = [
        'post_id', 'type', 'latitude', 'longitude', 'user_id', 'title', 'content', 'rating', 'image'
    ];


    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function tags()
    // {
    //     return $this->belongsToMany('App\Tag')->withTimestamps();
    // }

    // public function comments()
    // {
    //     return $this->hasMany('App\Comment');
    // }

    // public function bookmarks()
    // {
    //     return $this->hasMany('App\User\Bookmark');
    // }

    // public function blocks()
    // {
    //     return $this->hasMany('App\Article\Block');
    // }
}
