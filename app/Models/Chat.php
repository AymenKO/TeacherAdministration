<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [];

    //many-to-many relation with users
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_chats', 'chat_id', 'user1_id')
                    ->using(User::class)
                    ->withPivot('content', 'message_sent_date')
                    ->withTimestamps();
    }
}
