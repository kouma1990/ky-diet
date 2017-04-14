<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRoom()
    {
        return "room";
        //$dates = DietData::select(["date"])->groupBy("date")->orderBy("date")->get()->pluck("date");
        //$diet_data = DietData::orderBy("date")->get();
        //return view('home', compact('dates', 'diet_data'));
    }
    
    public function createRoom()
    {
        return "createRoom";
    }
    
    public function deleteRoom()
    {
        return "deleteRoom";
    }
}
