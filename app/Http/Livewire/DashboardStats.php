<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Table;
use App\Models\Transaction;
use Livewire\Component;

class DashboardStats extends Component
{
    public $open_today;
    public $closed_today;
    public $active_tables;
    public $sales_today;



    public function stats(){
        $this->open_today = Order::whereDate('created_at', Carbon::today())->where('status','=','active')->get();
        $this->closed_today = Order::whereDate('created_at', Carbon::today())->where('status','=','closed')->get();
        $this->active_tables = Table::where('status','=','active')->get();
        $sales = Transaction::whereDate('transac_date', Carbon::today())->get();
        $totals = 0;
        foreach($sales as $sale){
            $totals = $totals + $sale->transac_amount;
        }
        $this->sales_today = $totals;
    }



    public function render()
    {
        $this->stats();
        return view('livewire.dashboard-stats');
    }
}
