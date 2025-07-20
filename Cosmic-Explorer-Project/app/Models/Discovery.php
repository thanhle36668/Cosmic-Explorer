<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discovery extends Model
{
    public $table = 'discovery';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'title',
        'author',
        'description_short',
        'title_details',
        'description_details',
        'content_1',
        'content_2',
        'photo',
        'name_photo',
        'created_at',
        'slug'
    ];
}
