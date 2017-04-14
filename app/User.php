<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function rooms()
    {
        return $this->belongsToMany('App\Models\Room')->withTimestamps();
    }
    
    public function room_invitations()
    {
        return $this->hasMany('App\Models\RoomInvitation', 'invited_user_id', 'id');
    }
    
}
