<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constellations extends Model
{
    public $table = 'constellations';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name',
        'description_short',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
        'identify',
        'main_stars',
        'main_stars_2',
        'notable_features',
        'myths_meaning'
    ];
}
