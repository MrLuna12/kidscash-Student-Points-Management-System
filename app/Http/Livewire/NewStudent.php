<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class NewStudent extends Component
{
    public $fname;
    public $lname;
    public $dob;
    public $room;
    public $roomName;
    public $points = 0;

    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'dob' => 'required|date',
        'roomName' => 'required',
        'points' => 'required|numeric',
    ];
    public function mount (Room $room): void
    {
        $this->room = $room;
        $this->roomName = $this->room->name;
    }

    public function nameFormat ($first, $last)
    {
        //trim white space and make first letter capital
        $first = ucfirst(strtolower(trim($first)));
        $last = ucfirst(strtolower(trim($last)));
        return $first . ' ' . $last;
    }

    public function dateFormat($dob)
    {
        // Convert the input string to a Carbon instance
        $dobAsDateTime = Carbon::createFromFormat('Y-m-d', $dob);

        return $dobAsDateTime->format('Y-m-d H:i:s');
    }

    public function saveStudent() {
        // Validate the form data
        $this->validate();

        $student = new Student();
        $student->name = $this->nameFormat($this->fname, $this->lname);
        $student->dob = $this->dateFormat($this->dob);
        $student->points = $this->points;
        $student->room_id = $this->room->id;
        $student->save();

        return redirect('/rooms/'. strtolower($this->roomName));

    }

    public function render()
    {
        return view('livewire.new-student')
            ->layout('components.layout');
    }
}
