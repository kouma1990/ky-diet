<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\DietData;

use Facades\App\Services\Util;

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
        
        // 部屋の所属していない場合はhomeにリダイレクト
        if( $room->users->where("id", \Auth::user()->id)->count() === 0) {
            return redirect("/home");   
        }
        
        //$dates = DietData::select(["date"])->whereIn("user_id", $room->users->pluck("id"))->groupBy("date")->orderBy("date")->get()->pluck("date");
        $dates= collect(Util::getDateArrayOneYear());
        return view('room.room', compact('dates', 'room'));
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
