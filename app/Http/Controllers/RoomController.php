<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function getAllRooms() {
        return view('room', ["rooms" => Room::all()]);
    }

    public function getRoomByName(Request $request, Room $room) {
        return view('student', ['room' => $room]);
    }
}
