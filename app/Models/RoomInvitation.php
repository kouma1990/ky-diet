<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomInvitation extends Model
{
    protected $table = 'room_invitations';
    protected $fillable = ['inviting_user_id', 'invited_user_id', 'room_id'];
    
    public function inviting_user()
    {
        return $this->belongsTo("App\User", "inviting_user_id", "id");    
    }
    
    public function invited_user()
    {
        return $this->belongsTo("App\User", "invited_user_id", "id");
    }
    
    public function room()
    {
        return $this->belongsTo("App\Models\Room", "room_id", "id");
    }
}
