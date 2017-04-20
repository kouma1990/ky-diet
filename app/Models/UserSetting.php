<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $table = 'user_settings';
    protected $fillable = ['color', 'default_chart', 'target_weight', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo("App\User", "admin_user_id", "id");
    }
    
    public function getColorCode()
    {
        $tmp =  explode(",", $this->color);
        $color_code = "#" . $this->dechex00($tmp[0]) . $this->dechex00($tmp[1]) . $this->dechex00($tmp[2]);
        return $color_code;
    }
    
    private function dechex00($number){
        return str_pad(dechex($number), 2, 0, STR_PAD_LEFT);
    }
}
