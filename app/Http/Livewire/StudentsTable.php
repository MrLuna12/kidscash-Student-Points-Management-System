<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Student;
use Livewire\Component;

class StudentsTable extends Component
{
    public $selectedRoom;

    public function render()
    {
        return view('livewire.students-table', ["students"=>Student::all(), "rooms"=>Room::all()]);
    }
}
