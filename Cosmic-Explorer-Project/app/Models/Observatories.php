<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observatories extends Model
{
    public $table = 'observatories';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name',
        'location',
        'photo'
    ];
}
