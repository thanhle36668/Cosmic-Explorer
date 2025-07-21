<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    public $table = 'subscribe';

    public $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'registration_date' => 'datetime',
    ];

    public $fillable = [
        'name',
        'email',
        'registration_date',
        'status',
        'slug',
    ];
}
