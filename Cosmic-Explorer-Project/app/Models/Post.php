<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 
        'slug',
        'content', 
        'category_id',
        'is_published',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
