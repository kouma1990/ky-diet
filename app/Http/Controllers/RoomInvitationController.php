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
        $room_invitation = RoomInvitation::find($id);
        if($request->action === "join") {
            $room_invitation->room->users()->attach([$room_invitation->invited_user_id]);
        }
        $room_invitation->delete();
        return redirect()->back();
    }
}
