<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'news';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'title',
        'description_short',
        'photo'
    ];
}
