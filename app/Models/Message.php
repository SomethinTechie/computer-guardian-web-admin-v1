<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'user_messages';

    protected $fillable = [
        'thread_id',
        'user_id',
        'message',
    ];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
