<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietData extends Model
{
    protected $table = 'diet_data';
    protected $fillable = [
        'weight', 'date', 'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }
}
