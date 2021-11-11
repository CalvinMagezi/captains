<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;

class DashboardSidebar extends Component
{
    public function sections(){
        $sections = Section::all();
        return $sections;
    }
    public function render()
    {
        return view('livewire.dashboard-sidebar', [
            'sections' => $this->sections()
        ]);
    }
}
