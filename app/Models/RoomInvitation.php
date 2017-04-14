<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomInvitation extends Model
{
    public function User()
    {
        return $this->belongsTo("App\User", "invited_user_id", "id");
    }
    
    public function Room()
    {
        return $this->belongsTo("App\Models\Room", "room_id", "id");
    }
}
