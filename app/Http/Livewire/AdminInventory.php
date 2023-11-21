<?php

namespace App\Http\Livewire;

use App\Models\Point;
use Livewire\Component;

class AdminInventory extends Table
{
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function render()
    {
        $points = Point::orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);


        return view('livewire.admin-inventory', compact('points'))
            ->layout('components.layout');
    }
}
