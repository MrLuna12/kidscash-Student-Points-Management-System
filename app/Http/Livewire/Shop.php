<?php

namespace App\Http\Livewire;

use App\Models\Point;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class Shop extends Points
{
    public function createTransaction($pointArray) {
        foreach ($pointArray as $key => $value) {
            // Create a new transaction record
            $transaction = new Transaction();
            $transaction->student_id = $this->studentId;
            $transaction->point_id = $key;
            $transaction->amount = $value;
            $transaction->type = 'Spent';
            $transaction->save();
        }
    }
    public function performTransaction()
    {
        $student = Student::findOrFail($this->studentId);
        $totalPoints = $this->getTotalPoints();
        if ( ($student->points - $totalPoints) >= 0) {
            $this->createTransaction($this->selectedPoints);
            $student->points -= $totalPoints;
            $student->save();
        } else {
            session()->flash('error_message', 'You do not have enough points.');
            return;
        }

        return redirect('/rooms/' . $this->roomName)->with('success', "$student->name spent $totalPoints points.\n New balance: $student->points");
    }

    public function confirmCheckout(): void
    {
        if (!$this->selectedPoints) {
            // No points selected, set an error message
            session()->flash('error_message', 'Please select at least one item.');
            return;
        } else {
            $this->emit('checkout-modal');
        }
    }

    public function submitPoints(): void {
        try {
            $this->performTransaction();
        } catch (\Exception $e) {
            Log::error('Error during transaction: ' . $e->getMessage());
            session()->flash('error_message', 'An error occurred during the transaction.');
        }
    }


    public function render()
    {
        $points = Point::where('type', 0)
            ->orderBy('name')
            ->get();
        return view('livewire.shop', compact('points'));
    }
}
