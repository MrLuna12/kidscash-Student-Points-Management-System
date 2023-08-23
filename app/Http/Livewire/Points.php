<?php

namespace App\Http\Livewire;

use App\Models\Point;
use App\Models\Student;
use Livewire\Component;

class Points extends Component
{
    public $selectedPoints = [];
    public $studentId;

    public function mount($studentId)
    {
        $this->studentId = $studentId;
    }

    public function getTotalPoints()
    {
        return array_sum($this->selectedPoints);
    }

    public function submitPoints()
    {
        $totalPoints = $this->getTotalPoints();
        $student = Student::findOrFail($this->studentId);
        $student->points += $totalPoints;
        $student->save();

        $this->reset(); // Clear selected points
        // Redirect or emit an event
    }

    public function render()
    {
        $points = Point::all();
        return view('livewire.points', compact('points'));
    }


}
