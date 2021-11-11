<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopBar extends Component
{
    public function clearNotification($id){
        dd($id);
        DB::table('notifications')->where('unique_key','=', $id)->update(['completed' => true]);
    }

    public function notifications(){
        $notifications = Notification::where('for','=',Auth::user()->name)->where('completed','=',false)->get();
        return $notifications;
    }
    public function render()
    {
        return view('livewire.top-bar',[
            'notifications' => $this->notifications()
        ]);
    }
}
