<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EditOrder extends Component
{
    public $order_id;


    public function order(){
        $order = DB::table('orders')->where('id', '=', $this->order_id)->first();
        return($order);
    }


    public function render()
    {
        return view('livewire.edit-order', [
            'order' => $this->order()
        ]);
    }
}
