<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
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
//

Route::get('/students', [StudentController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
});
