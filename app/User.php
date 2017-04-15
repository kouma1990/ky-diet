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
    
    public function user_setting()
    {
        return $this->hasOne('App\Models\UserSetting', 'user_id', 'id');
    }
    
    public function diet_datas()
    {
        return $this->hasMany('App\Models\DietData', 'user_id', 'id');
    }
    
    public function rooms()
    {
        return $this->belongsToMany('App\Models\Room')->withTimestamps();
    }
    
    public function invited_room_invitations()
    {
        return $this->hasMany('App\Models\RoomInvitation', 'invited_user_id', 'id');
    }
    
    public function inviting_room_invitations()
    {
        return $this->hasMany('App\Models\RoomInvitation', 'inviting_user_id', 'id');
    }
    
}
