<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount(Request $request, Room $room, Student $student): void
    {
        $this->student = $student;
        $this->room = $room;
    }

    public function render()
    {
        $transactions = Transaction::with('point')
            ->paginate(15);

        return view('livewire.history', compact('transactions'))
            ->layout('components.layout');
    }
}
