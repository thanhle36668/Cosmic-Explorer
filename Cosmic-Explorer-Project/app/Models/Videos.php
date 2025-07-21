<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    public $table = 'videos';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name_video',
        'genre',
        'source_video',
        'description_short',
        'channel'
    ];
}
