<?php

namespace App\Http\Livewire;


use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Admin extends Table
{
    public $sortField = 'name';
    public $sortDirection = 'asc';


    public function render()
    {
        $users = User::selectRaw('users.id, users.name, users.email, users.role, GROUP_CONCAT(rooms.name ORDER BY rooms.name ASC SEPARATOR \', \') as room_name')
            ->leftJoin('room_user', 'users.id', '=', 'room_user.user_id')
            ->leftJoin('rooms', 'rooms.id', '=', 'room_user.room_id')
            ->groupBy('users.id', 'users.name', 'users.email', 'users.role')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
        return view('livewire.admin', compact('users'))
            ->layout('components.layout');
    }
}
