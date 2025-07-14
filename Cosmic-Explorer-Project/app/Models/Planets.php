<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planets extends Model
{
    public $table = 'planets';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name',
        'title_short',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
        'photo_extra',
        'discovery_date',
        'diameter_km',
        'avg_distance_to_earth_km',
        'avg_distance_to_sun_km',
        'brief_intro_composition'
    ];
}
