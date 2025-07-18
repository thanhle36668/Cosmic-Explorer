<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Constellations extends Model
{
    use HasFactory, HasSlug;

    public $table = 'constellations';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name',
        'title',
        'photo',
        'photo_2',
        'photo_3',
        'photo_4',
        'photo_5',
        'identification',
        'main_stars',
        'notable_features',
        'myths_meaning',
        'slug',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
