<?php

namespace App\Http\Livewire;

use App\Models\Table;
use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class SectionProducts extends Component
{
    public $dispatched_to;

    public function details(){

    }

    public function render()
    {
        $all_orders = DB::table('orders')
        ->where('status','=','ongoing')
        ->paginate(10);

        $order_details = OrderDetail::where('ready','=',null)->get();

        $tables = Table::all();

        return view('livewire.section-products', [
            'all_orders' => $all_orders,
            'tables' => $tables,
            'order_details' => $order_details,

        ]);
    }
}
