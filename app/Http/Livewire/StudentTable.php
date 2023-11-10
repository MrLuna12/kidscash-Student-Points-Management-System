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
        // Get the currently logged-in user
        $user = Auth::user();

        // Access the rooms that the user is assigned to
        $userRooms = $user->rooms;

        // Check if the user is assigned to the requested room
        if ($userRooms->contains($room)) {
            // Set the room
            $this->room = $room;
        } else {
            // If the user doesn't have access to the requested room
             redirect('/rooms')->with('error', 'You do not have access to this room.');
        }
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

