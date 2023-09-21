<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function mount(Request $request, Room $room, Student $student): void
    {
        $this->student = $student;
        $this->room = $room;
    }

    public function sortBy($field) {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function swapSortDirection() {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }


    public function refund($transactionId) {
        try {
            $oldTransaction = Transaction::findOrFail($transactionId);
            $transaction = new Transaction();
            $transaction->student_id = $oldTransaction['student_id'];
            $transaction->point_id = $oldTransaction['point_id'];
            $transaction->amount = $oldTransaction['amount'];
            $transaction->type = 'Refunded';

            $this->student->points += $oldTransaction['amount'];


            $this->student->save();
            $transaction->save();

            $this->emit('show-refund-success');
        } catch (\Exception $e) {
            // Logging the error
            Log::error('Refund error: ' . $e->getMessage());

            // Handle the exception
            session()->flash('error', 'An error occurred during the refund process.');
        }
    }

    public function confirmRefund($transactionId): void
    {
            $this->emit('show-refund-modal', $transactionId);
    }

    public function render()
    {
        $transactions = Transaction::with('point')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(15);

        return view('livewire.history', compact('transactions'))
            ->layout('components.layout');
    }
}
