<?php

namespace App\Http\Livewire;


use App\Models\Point;
use App\Models\User;

class AdminUser extends Table
{
    public $sortField = 'name';
    public $sortDirection = 'asc';
//    public $activeTab = 'nav-users';

//    public function sortBy($field)
//    {
//        if ($this->sortField === $field) {
//            $this->sortDirection = $this->swapSortDirection();
//        } else {
//            $this->sortDirection = 'asc';
//        }
//        $this->sortField = $field;
//
//        // Update the active tab based on the sort field
//        $this->activeTab = 'nav-users';
//    }
//    public function pointSortBy($field) {
//        if ($this->pointSortField === $field) {
//            $this->pointSortDirection = $this->pointSwapSortDirection();
//        } else {
//            $this->pointSortDirection = 'asc';
//        }
//        $this->pointSortField = $field;
//
//        $this->activeTab = 'nav-inventory';
//    }

//    public function pointSwapSortDirection() {
//        return $this->pointSortDirection === 'asc' ? 'desc' : 'asc';
//    }


    public function render()
    {
        $users = User::selectRaw('users.id, users.name, users.email, users.role, GROUP_CONCAT(rooms.name ORDER BY rooms.name ASC SEPARATOR \', \') as room_name')
            ->leftJoin('room_user', 'users.id', '=', 'room_user.user_id')
            ->leftJoin('rooms', 'rooms.id', '=', 'room_user.room_id')
            ->groupBy('users.id', 'users.name', 'users.email', 'users.role')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(7);

        return view('livewire.admin-user', compact('users'))
            ->layout('components.layout');
    }
}
