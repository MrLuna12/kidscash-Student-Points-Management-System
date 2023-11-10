<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentTable extends Table
{
    public $room;
    public $sortField = 'name';
    public $sortDirection = 'desc';

    public function mount(Room $room): void
    {
        $this->room = $room;
    }
    public function render()
    {
        // Retrieve students associated with the requested room with pagination
        $students = $this->room->students()
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(5);

        return view('livewire.student-table', compact('students'))
            ->layout('components.layout');
    }
}

