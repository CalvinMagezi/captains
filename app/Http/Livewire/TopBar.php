<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopBar extends Component
{
    public $term;
    public function clearNotification($id){
        DB::table('notifications')->where('id','=', $id)->update(['completed' => true]);
    }

    public function notifications(){
        $notifications = Notification::where('for','=',Auth::user()->name)->where('completed','=',false)->get();
        return $notifications;
    }

    public function searchOrder(){
        $found_results = DB::table('orders')->where('id','=',$this->term)->first();
        if(!$found_results){
            return;
        }else{
            return($found_results);
        }
    }
    public function render()
    {
        return view('livewire.top-bar',[
            'notifications' => $this->notifications(),
            'term_results' => $this->searchOrder()
        ]);
    }
}
