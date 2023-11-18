<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function getUserRooms() {
        //Get the currently logged-in user
        $user = Auth::user();

        //access the rooms that the user is assigned to
        $rooms = $user->rooms;
        return view('room', ['rooms' => $rooms]);
    }

    public function getStudentsByRoom(Room $room) {
        return view('student', ['room' => $room]);
    }


}
