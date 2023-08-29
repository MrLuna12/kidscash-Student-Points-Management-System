<?php

namespace App\Http\Livewire;

use App\Models\Point;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Points extends Component
{
    public array $selectedPoints = [];
    public int $studentId;

    public function mount($studentId): void
    {
        $this->studentId = $studentId;
    }


    public function getTotalPoints(): int
    {
        $this->selectedPoints = array_filter($this->selectedPoints);
        return array_sum($this->selectedPoints);
    }


//    public function submitPoints()
//    {
//        // Perform the transaction logic here
//        try {
//            $totalPoints = $this->getTotalPoints();
//            $student = Student::findOrFail($this->studentId);
//            $student->points += $totalPoints;
//            $student->save();
//
//            return redirect('/rooms/' . strtolower($student->room->name))->with('success_message', "Point transaction of $totalPoints completed");
//
//        } catch (\Exception $e) {
//            // Set error message
//            session()->flash('error_message', 'An error occurred during the transaction');
//        }
//    }

    private function performTransaction()
    {
        $totalPoints = $this->getTotalPoints();
        $student = Student::findOrFail($this->studentId);
        $student->points += $totalPoints;
        $student->save();

        // Redirect user
        return redirect('/rooms/' . strtolower($student->room->name))->with('success_message', "Point transaction of $totalPoints completed");
    }

    public function submitPoints(): void
    {
        if (!$this->selectedPoints) {
            // No points selected, set an error message
            session()->flash('error_message', 'Please select at least one point.');
            return;
        }

        try {
            $this->performTransaction();
        } catch (\Exception $e) {
            Log::error('Error during transaction: ' . $e->getMessage());
            session()->flash('error_message', 'An error occurred during the transaction.');
        }
    }
    public function render()
    {
        $points = Point::all();
        return view('livewire.points', compact('points'));
    }

}
