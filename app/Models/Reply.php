<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'body',
        'thread_id',
        'reply_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function thread(){
        return $this->belongsTo(Thread::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory;
}
