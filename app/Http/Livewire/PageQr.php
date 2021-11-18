<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageQr extends Component
{
    public $table;

    public function table(){
        $table = DB::table('tables')->where('table_number','=', $this->table)->first();
        return($table);
    }
    public function render()
    {
        return view('livewire.page-qr', [
            'table_chosen' => $this->table()
        ]);
    }
}
