<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['room_name'];
    
    public function RoomInvitation()
    {
        return $this->hasMany("App\Models\RoomInvitation", "room_id", "id");
    }
}
