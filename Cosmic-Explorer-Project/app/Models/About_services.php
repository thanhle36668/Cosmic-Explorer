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
        'description',
        'photo',
    ];
}
