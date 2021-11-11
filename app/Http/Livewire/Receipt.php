<?php

namespace App\Http\Livewire;

use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Receipt extends Component
{
    public $order;

    public function order(){
        $order = DB::table('orders')->where('id','=',$this->order)->first();
        return ($order);
    }

    public function details(){
        $details = OrderDetail::receiptDetails($this->order);
        return($details);
    }

    public function render()
    {
        return view('livewire.receipt', [
            'selected_order' => $this->order(),
            'details' => $this->details(),
        ]);
    }
}
