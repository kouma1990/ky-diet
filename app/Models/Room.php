<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $fillable = ['room_name', 'admin_user_id'];
    
    public function admin_user()
    {
        return $this->belongsTo("App\User", "admin_user_id", "id");
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    
    public function room_invitations()
    {
        return $this->hasMany("App\Models\RoomInvitation", "room_id", "id");
    }
    
}
