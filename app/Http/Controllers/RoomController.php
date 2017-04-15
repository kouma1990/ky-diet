<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\DietData;

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
    public function showRoom($id)
    {
        $room = Room::find($id);
        $dates = DietData::select(["date"])->whereIn("user_id", $room->users->pluck("id"))->groupBy("date")->orderBy("date")->get()->pluck("date");
        
       // return $room;
        return view('room.room', compact('dates', 'room'));
        //$dates = DietData::select(["date"])->groupBy("date")->orderBy("date")->get()->pluck("date");
        //$diet_data = DietData::orderBy("date")->get();
        //return view('home', compact('dates', 'diet_data'));
    }
    
    public function createRoom(Request $reqeust)
    {
        $room = Room::create(["room_name"=>$reqeust->room_name, "admin_user_id" => \Auth::user()->id]);
        $room->users()->attach($room->admin_user_id);
        return redirect()->back();
    }
    
    public function deleteRoom(Reqeust $reqeust)
    {
        return "deleteRoom";
        
        return redirect()->back();
    }
}
