<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    public $table = 'introduction';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'website_name',
        'short_introduction',
        'short_introduction_2',
        'company_description',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
        'photo_5',
        'photo_6',
        'photo_7',
        'photo_8',
    ];
}
