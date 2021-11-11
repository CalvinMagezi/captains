<?php

namespace App\Http\Livewire;

use App\Models\Staff;
use Livewire\Component;

class TableMapping extends Component
{
    public function staff(){
        $staff = Staff::all();
        return $staff;
    }
    public function render()
    {
        return view('livewire.table-mapping', [
            'staff' => $this->staff()
        ]);
    }
}
