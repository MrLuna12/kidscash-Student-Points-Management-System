<?php

namespace App\Http\Livewire;

use App\Models\Point;
use Livewire\Component;

class EditInventory extends Component
{
    public $name;
    public $description;
    public $value;
    public $type;
    public $quantity;
    public $point;
    public $isEdit;

    public function mount($id): void
    {
        $this->point = Point::find($id);
        $this->name = $this->point->name;
        $this->description = $this->point->description;
        $this->value = $this->point->value;
        $this->type = $this->point->type;
        $this->quantity = $this->point->quantity;
        $this->isEdit = false;
    }

    public function editForm() {
        $this->isEdit = true;
    }

    public function save() {
        if ($this->isEdit){
            $this->point->name = $this->name;
            $this->point->description = $this->description;
            $this->point->value = $this->value;
            $this->point->type = $this->type;
            $this->point->quantity = $this->quantity;
            $this->point->save();

            return redirect('/admin')->with('success', "Changes Saved");
        }
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
        return view('livewire.edit-inventory')
            ->layout('components.layout');
    }
}
