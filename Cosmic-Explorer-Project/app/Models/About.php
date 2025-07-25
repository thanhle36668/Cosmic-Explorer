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
        'link_1',
        'link_2',
        'link_3',
    ];
}
