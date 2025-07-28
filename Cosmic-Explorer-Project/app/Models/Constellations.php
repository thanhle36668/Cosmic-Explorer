<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constellations extends Model
{
    public $table = 'constellations';

    public $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $fillable = [
        'name',
        'title',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
        'identification',
        'main_stars',
        'notable_features',
        'myths_meaning',
        'slug',
        'status',
    ];
}
