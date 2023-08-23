<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function getAllRooms() {
        return view('room', ["rooms" => Room::all()]);
    }

    public function getStudentsByRoom(Request $request, Room $room) {
        return view('student', ['room' => $room]);
    }

    public function getPointList(Request $request, Room $room, Student $student)
    {
        return view('earn', [
            'student' => $student,
            'room' => $room
        ]);
    }
}
