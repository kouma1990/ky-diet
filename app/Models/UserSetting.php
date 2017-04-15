<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $table = 'user_settings';
    protected $fillable = ['color', 'default_chart', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo("App\User", "admin_user_id", "id");
    }
}
