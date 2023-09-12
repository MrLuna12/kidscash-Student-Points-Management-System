<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function getEarnPointList(Request $request, Room $room, Student $student)
    {
        return view('earn', [
            'student' => $student,
            'room' => $room
        ]);
    }

    public function getSpendPointList(Request $request, Room $room, Student $student)
    {
        return view('shop', [
            'student' => $student,
            'room' => $room
        ]);
    }
}
