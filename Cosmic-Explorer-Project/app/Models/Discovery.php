<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discovery extends Model
{
    use HasFactory, HasSlug;

    public $table = 'discovery';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'title',
        'author',
        'description_short',
        'title_details',
        'description_details',
        'content_1',
        'content_2',
        'photo',
        'name_photo',
        'created_at',
        'slug'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
