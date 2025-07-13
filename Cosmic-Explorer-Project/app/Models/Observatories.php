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
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
        'altitude_meters',
        'established_year',
        'managing_organization',
        'main_instruments',
        'primary_research_areas',
        'public_access_info',
        'additional_notes'
    ];
}
