<?php

namespace App\Http\Livewire;

use App\City;
use Livewire\Component;
use Livewire\WithPagination;

class DataPagination extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.data-pagination',
            ['cities' => City::paginate(3)]);
    }
}
