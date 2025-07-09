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
        'photo'
    ];
}
