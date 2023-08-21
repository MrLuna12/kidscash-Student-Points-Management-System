<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//This is for the log-in stuff
// Route::get('/', function () {
//    //return view('students', ["students"=>Student::all()]);
//    return view('home');
// });
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/add', [StudentController::class, 'add']);
Route::get('/students/spend', [StudentController::class, 'spend']);



Route::get('/rooms', [RoomController::class, 'getAllRooms']);
Route::get('/rooms/{room:name}', [RoomController::class, 'getStudentsByRoom']);

Route::get('/rooms/{room:name}/students/{student}/earn', [RoomController::class, 'getPointList']);

Route::get('/rooms/{room:name}/students/{student}/shop', function(Room $room, Student $student) {
    return view('spend', [
        'student' => $student,
        'room' => $room
    ]);
});
