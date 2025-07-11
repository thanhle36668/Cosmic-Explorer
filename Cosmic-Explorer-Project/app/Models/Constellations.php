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
        'photo'
    ];
}
