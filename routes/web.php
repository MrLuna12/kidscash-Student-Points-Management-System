<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Livewire\AdminUser;
use App\Http\Livewire\EditInventory;
use App\Http\Livewire\EditUser;
use App\Http\Livewire\History;
use App\Http\Livewire\StudentTable;
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
 Route::get('/', function () {
    return view('home');
 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->get('/rooms', [RoomController::class, 'getUserRooms']);

Route::middleware(['auth', 'livewire.room.assignment'])->group(function() {
    Route::get('/rooms/{room:name}/students/{student}/history', History::class);
});

Route::middleware(['auth', 'blade.room.assignment'])->group(function() {
    Route::get('/rooms/{room:name}', [RoomController::class, 'getStudentsByRoom']);
    Route::get('/rooms/{room:name}/students/{student}/earn', [PointController::class, 'getEarnPointList']);
    Route::get('/rooms/{room:name}/students/{student}/shop', [PointController::class, 'getSpendPointList']);
});

Route::middleware('auth.admin')->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/edit/user/{id}', EditUser::class)->name('edit.user');
    Route::get('/admin/edit/inventory/{id}', EditInventory::class)->name('edit.inventory');
});

