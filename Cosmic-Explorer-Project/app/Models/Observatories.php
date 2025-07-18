<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Observatories extends Model
{
    use HasFactory, HasSlug;

    public $table = 'observatories';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name',
        'observatories',
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
        'additional_notes',
        'slug',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
