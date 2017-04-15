<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\User;
use App\Models\Room;
use App\Models\RoomInvitation;

class CreateRoomInvitation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|exists:users,name",
        ];
    }
    
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $name = $this->input('name');
            $room_id = $this->input('room_id');
            $user_id = User::where("name", "=", $name)->first()->id;
            $is_invited = RoomInvitation::where("invited_user_id", "=", $user_id)->where("room_id", "=", $room_id)->count();
            $is_in_room = Room::find($room_id)->users->where("id", $user_id)->count();
            if($is_invited > 0) {
                $validator->errors()->add('test', "already invited");
            }
            
            if($is_in_room > 0) {
                $validator->errors()->add('test', "already in room");
            }
        });
    }
}
