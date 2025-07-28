<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About_services extends Model
{
    public $table = 'about_services';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name',
        'name_2',
        'name_3',
        'description',
        'description_2',
        'description_3',
        'photo',
        'photo_2',
        'photo_3',
    ];
}
