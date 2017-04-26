<?php

namespace App\Services;

use Carbon\Carbon;

class Util
{
    public function getDateArrayOneYear()
    {
        $today = Carbon::today();
        $day = Carbon::today()->subYear();
        
        $date_array = [];
        while($day->lte($today)) {
            $date_array[] = $day->format("Y-m-d");
            $day->addDay();
        }
        return $date_array;
    }
    
}
    
    
    
    