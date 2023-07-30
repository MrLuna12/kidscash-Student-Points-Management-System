<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Student;
use Livewire\Component;

class FormElements extends Component
{
    public $selectedRoom = '1';

    public function index () {
        return view('index');
    }


    public function render()
    {
        return view('livewire.form-elements', ["students"=>Student::all(), "rooms"=>Room::all()]);
    }
}
