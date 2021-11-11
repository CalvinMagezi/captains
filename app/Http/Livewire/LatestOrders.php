<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class LatestOrders extends Component
{
    public $todays_orders;

    public function todays(){
        $this->todays_orders = Order::whereDate('created_at',Carbon::today())->get();
    }


    public function read(){
        $data = Order::orderBy('id','desc')->paginate(10);
        return $data;
    }


    public function render()
    {
        $this->todays();
        return view('livewire.latest-orders',[
            'data' => $this->read()
        ]);
    }
}
