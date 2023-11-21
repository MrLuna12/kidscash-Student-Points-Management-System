<?php

namespace App\Http\Livewire;

use App\Models\Room;
use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $selectedRooms = [];
    public $isAdmin;
    public $currentRoll;
    public $user;
    public $userRooms;
    public $rooms;
    public $isEdit;

    public function mount($id): void
    {
        $this->user = User::find($id);
        $this->userRooms = $this->user->rooms;
        $this->rooms = Room::all();
        $this->isAdmin = $this->user->role;
        $this->currentRoll = $this->user->role;
        $this->isEdit = false;
        $this->existingRooms($this->userRooms);
    }

    public function existingRooms ($userRooms): void
    {
        foreach ($userRooms as $room) {
            $this->selectedRooms [] = $room->id;
        }
    }

    public function saveProfile () {
        // Remove user from all rooms first to ensure data consistency
        $this->user->rooms()->detach();

        // Attach user to selected rooms
        foreach ($this->selectedRooms as $roomId) {
            $room = Room::find($roomId);
            $room->users()->attach($this->user->id);
        }

        if ($this->currentRoll != $this->isAdmin) {
            $this->user->role = $this->isAdmin;
            $this->user->save();
        }

        return redirect('/admin')->with('success', "Changes Saved");
    }

    public function editForm() {
        $this->isEdit = true;
    }

    public function goBack()
    {
        if ($this->isEdit) {
            $this->emit('show-confirm-modal');
        } else {
            redirect('/admin/');
        }
    }


    public function render()
    {
        return view('livewire.edit-user')
            ->layout('components.layout');
    }
}
