<?php

namespace App\Http\Livewire;

use App\Models\Point;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
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
        // Check if any points are selected
        if (count($this->selectedPoints) === 0) {
            // Set an error message here if needed
            return;
        }
//        if ($this->selectedPoints->contains(false)){
//            $element = $this->selectedPoints->contains(false);
//            $this->selectedPoints->forget(false);
//            ddd($this->selectedPoints);
//        }


        $totalPoints = $this->getTotalPoints();
        $student = Student::findOrFail($this->studentId);

        // Perform the transaction logic here
        try {
            $student->points += $totalPoints;
            $student->save();
            $this->selectedPoints = []; // Clear selected points

            // Set success message
            return redirect('/rooms/' . strtolower($student->room->name))->with('success_message', "Point transaction of $totalPoints completed");
        } catch (\Exception $e) {
            // Set error message
            session()->flash('error_message', 'An error occurred during the transaction');
        }
    }
    public function render()
    {
        $points = Point::all();
        return view('livewire.points', compact('points'));
    }

}
