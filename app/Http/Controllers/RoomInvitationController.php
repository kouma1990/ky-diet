<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\RoomInvitation;

use App\Http\Requests\CreateRoomInvitation;

class RoomInvitationController extends Controller
{
    public function createRoomInvitation(CreateRoomInvitation $request)
    {
        $user_id = User::where("name", "=", $request->name)->first()->id;
        RoomInvitation::create([
            "room_id" => $request->room_id,
            "invited_user_id" => $user_id,
            "inviting_user_id" => \Auth::user()->id,
            ]);
        return redirect()->back();
    }
    
    public function processRoomInvitation($id, Request $request)
    {
        if($request->action === "join") {
            // 参加
            return "join";
        } else {
            // 拒否
            return "not join";
        }
    }
}
