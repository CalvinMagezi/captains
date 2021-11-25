<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Table;
use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\SectionSale;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class Cashier extends Component
{
    public $modalFormVisible;
    public $modalConfirmDeleteVisible;
    public $modelId;
    public $term;
    public $message;
    public $ordermessage;
    public $order_id;
    public $selected_id;
    public $expected;
    public $balance = 0;
    public $received = 0;
    public $pay_mode = "cash";
    public $searched;
    public $message_color;

    protected $listeners = [
        'clear_ordermessage' => 'clear_ordermessage'
    ];

    public function clear_ordermessage(){
        $this->ordermessage = '';
    }

    /**
     * Validation Rules
     *
     * @return void
     */
    public function rules(){
        return [
            'pay_mode' => 'required',
            'selected_id' => 'required',
            'expected' => 'required',
            'received' => 'required',
            'balance' => 'required',
            'pay_mode' => 'required'
        ];
    }

     /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Order::when($this->term, function($query, $term){
            return $query->where('id','LIKE',"%$term%")->orderBy('created_at','desc');
        })->paginate(7);
    }

    public function verifyOrder(){
        $this->searched = 00000;
        $id = $this->selected_id;
        $checkAvailable = Order::where('id','=',$id)->first();

        if(!$checkAvailable){
            $this->selected_id = $this->selected_id;
            $this->expected = 0;
            $this->message_color = 'red';
            return $this->ordermessage = 'Order ID Does not exist';
        }else{
            $this->selected_id = $this->selected_id;
            if ($checkAvailable->status == 'closed') {
                $this->expected = $checkAvailable->total_amount;
                $this->message_color = 'orange';
                $this->searched = $checkAvailable;
                return $this->ordermessage = "Order: $this->selected_id has been closed";
            }else{
                $this->expected = $checkAvailable->total_amount;
                $this->message_color = 'green';
                $this->searched = $checkAvailable;
                return $this->ordermessage = "Currently working on order: $this->selected_id";
            }
        }
    }

    public function closeOrder(){
        //Transaction Model
        $transaction = new Transaction;
        $transaction->order_key = $this->selected_id;
        $transaction->paid_amount = $this->received;
        $transaction->balance = $this->balance;
        $transaction->payment_method = $this->pay_mode;
        $transaction->handled_by_id = Auth::user()->id;
        $transaction->transac_date = Carbon::now('Africa/Nairobi');
        $transaction->transac_amount = $this->expected;
        $transaction->save();

        Order::where('id','=',$this->selected_id)->update([
            'status' => 'closed',
            'amount_received' => $this->received,
            'completed_at' => Carbon::now('Africa/Nairobi'),
            'closed_by' => Auth::user()->name
        ]);

        $theorder = Order::where('id','=',$this->selected_id)->first();

        Table::where('table_number','=',$theorder->table_number)->update([
            'order' => null,
            'status' => 'in-active'
        ]);

        $this->reset();
        $this->topUpSales();

        $this->message_color = 'green';
        return $this->ordermessage = "Successfully Closed Order";

    }

    public function topUpSales(){
        $closed_orders = OrderDetail::with('orderKey')->with('productKey')->where('ready','=','ready')->get();

        $main_bar = 0;
        $kitchen = 0;
        $cocktail_bar = 0;

        foreach ($closed_orders as $order) {
           if($order->orderKey->status == 'closed'){
                if($order->dispatched_to == 'kitchen'){
                    $kitchen = $kitchen + (int)$order->productKey->price;
                     $sectionSale = SectionSale::where('section_id','=',3)->first();
                     $sectionSale->update([
                        'todays_sales' => $kitchen + (int)$sectionSale->todays_sales,
                        'yesterdays_sales' => $kitchen + (int)$sectionSale->yesterdays_sales,
                        'weeks_sales' => $kitchen + (int)$sectionSale->weeks_sales,
                        'months_sales' => $kitchen + (int)$sectionSale->months_sales,
                        'years_sales' => $kitchen + (int)$sectionSale->years_sales,
                    ]);
                }
                if($order->dispatched_to == 'cocktail bar'){
                    $cocktail_bar = $cocktail_bar + (int)$order->productKey->price;
                     $sectionSale = SectionSale::where('section_id','=',2)->first();
                     $sectionSale->update([
                        'todays_sales' => $cocktail_bar + (int)$sectionSale->todays_sales,
                        'yesterdays_sales' => $cocktail_bar + (int)$sectionSale->yesterdays_sales,
                        'weeks_sales' => $cocktail_bar + (int)$sectionSale->weeks_sales,
                        'months_sales' => $cocktail_bar + (int)$sectionSale->months_sales,
                        'years_sales' => $cocktail_bar + (int)$sectionSale->years_sales,
                    ]);
                }
                if($order->dispatched_to == 'main bar'){
                    $main_bar = $main_bar + (int)$order->productKey->price;
                    $sectionSale = SectionSale::where('section_id','=',1)->first();
                     $sectionSale->update([
                        'todays_sales' => $main_bar + (int)$sectionSale->todays_sales,
                        'yesterdays_sales' => $main_bar + (int)$sectionSale->yesterdays_sales,
                        'weeks_sales' => $main_bar + (int)$sectionSale->weeks_sales,
                        'months_sales' => $main_bar + (int)$sectionSale->months_sales,
                        'years_sales' => $main_bar + (int)$sectionSale->years_sales,
                    ]);
                }
           }
        }
    }

    public function getChange(){
        if ($this->expected != '') {
            $this->balance =  (int)$this->received - (int)$this->expected ;
        }else{
            $this->balance = 0;
        }

    }

    public function render()
    {
        return view('livewire.cashier', [
            'data' => $this->read(),
            'searched' => $this->searched
        ]);

    }
}
