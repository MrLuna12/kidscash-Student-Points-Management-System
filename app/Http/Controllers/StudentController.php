<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index () {
        return view('index');
    }
}
