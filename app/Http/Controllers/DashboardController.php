<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class DashboardController extends Controller
{
    public function rooms()
    {
        return view('dashboard', ["rooms" => Room::all()]);
    }
}
