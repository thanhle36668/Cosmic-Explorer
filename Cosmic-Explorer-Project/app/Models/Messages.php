<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public $table = 'messages';

    public $primaryKey = 'id';

    public $timestamps = false;

    protected $casts = [
        'time_received_message' => 'datetime',
        'time_reply_message' => 'datetime',
    ];

    public $fillable = [
        'sender_name',
        'sender_email',
        'message',
        'time_received_message',
        'time_reply_message',
        'status',
        'reply_message',
        'replied_by',
        'slug',
    ];
}
