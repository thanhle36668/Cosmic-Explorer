<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public $table = 'about';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'title',
        'description_1',
        'description_2',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
    ];
}
