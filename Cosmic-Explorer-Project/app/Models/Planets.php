<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planets extends Model
{
    public $table = 'planets';

    public $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $fillable = [
        'name',
        'slug',
        'title_short',
        'status',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
        'photo_5',
        'discovery_date',
        'diameter_km',
        'avg_distance_to_earth_km',
        'avg_distance_to_sun_km',
        'brief_intro_composition',
    ];
}
