<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    public $table = 'books';

    public $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

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
        'slug',
        'link_amazon',
        'status',
    ];
}
