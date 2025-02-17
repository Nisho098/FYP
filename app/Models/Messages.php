<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $fillable = ['room_id', 'sender_id', 'message', 'is_read'];

    // Relationship to Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Relationship to User (Sender)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
