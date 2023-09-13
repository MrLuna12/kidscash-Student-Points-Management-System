<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class History extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
//        $transactions = Transaction::paginate(20);

        return view('livewire.history', ['transactions' => Transaction::paginate(10)])
            ->layout('components.layout');
    }
}
