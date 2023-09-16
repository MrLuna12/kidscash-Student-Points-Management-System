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

    public function render()
    {
        $transactions = Transaction::with('point')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(15);

        return view('livewire.history', compact('transactions'))
            ->layout('components.layout');
    }
}
