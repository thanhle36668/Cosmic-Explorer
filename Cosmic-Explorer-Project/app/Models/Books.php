<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{

    use HasFactory, HasSlug;

    public $table = 'books';

    public $primaryKey = 'id';

    public $timestamps = false;

    public $fillable = [
        'name_book',
        'author',
        'publication_year',
        'genre',
        'description',
        'main_title',
        'main_content',
        'main_content_1',
        'main_content_2',
        'photo_book',
        'slug'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_book')
            ->saveSlugsTo('slug');
    }
}
