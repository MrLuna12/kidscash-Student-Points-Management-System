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
    public $pointSelected = false;
    public $roomName;

    public function mount($studentId): void
    {
        $this->studentId = $studentId;
        $this->roomName = strtolower(Student::findOrFail($this->studentId)->room->name);
    }


    public function getTotalPoints(): int
    {
        $this->selectedPoints = array_filter($this->selectedPoints);
        return array_sum($this->selectedPoints);
    }


    private function performTransaction()
    {
        $totalPoints = $this->getTotalPoints();
        $student = Student::findOrFail($this->studentId);
        $student->points += $totalPoints;
        $student->save();

        // Redirect user
        return redirect('/rooms/' . $this->roomName)->with('success', "Point transaction of $totalPoints completed");

        //Ask Dr. Wheat if he prefers this one better
//        return redirect('/rooms/' . $this->roomName)->with('success', "$student->name received $totalPoints points. New balance: $student->points");
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

    public function updatedSelectedPoints()
    {
        //counts the number of selected points that are not empty
        //then compares it to 0. if it is > 0 then point selected = true
        $this->pointSelected = count(array_filter($this->selectedPoints)) > 0;
    }

    public function goBack()
    {
        if ($this->pointSelected) {
            $this->emit('show-confirm-modal');
        } else {
            redirect('/rooms/' . $this->roomName);
        }
    }

    public function render()
    {
        $points = Point::where('type', 1)
                    ->orderBy('name')
                    ->get();
        return view('livewire.points', compact('points'));
    }

}

