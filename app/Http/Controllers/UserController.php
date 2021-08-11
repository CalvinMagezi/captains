<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Log;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.create');
    }

    public function create(Request $request){
            
        $new = new User([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'role' => $request->role,
            'staff_number' => $request->staff_number,
            'pin' => $request->pin,
            'password' => Hash::make('password')
        ]);

        $new->save();

        return redirect('/manage-users');
    }

    public function manage(){
        $users = User::orderBy('created_at','desc')->paginate(25);

        return view('admin.users.manage', [
            'users' => $users
        ]);
    }

    public function edit(Request $request){

        $data = request()->except(['_token','id']);
        
        $user_id = $request->id;
        
        $updates = array_filter($data); 

        $update_auction = User::where('id','=',$user_id)
                            ->update($updates);

        return redirect('/manage-users');
    }

    public function delete(Request $request){
        $user = User::where('id','=',$request->id)->first();
        $user->delete();
        return redirect('/manage-users');
    }

    public function casuals(){
        $staff = User::where('role','=','staff')->get();
        $casuals = User::where('role','=','casual')->get();

        return view('admin.users.casuals',[
            'staff' => $staff,
            'casuals' => $casuals
        ]);
    }

    public function assign_casual(Request $request){
        $casual = User::where('id','=',$request->casual)->first();
        $staff = User::where('id','=',$request->staff)->first();

        $update = User::where('id','=',$request->staff)->update([
            'casuals_assigned' => $staff->casuals_assigned.', '.$casual->first_name.' '.$casual->last_name
        ]);

        return redirect('/manage-users');
    }

    public function clear_casuals(Request $request){

        $update = User::where('id','=',$request->id)->update([
            'casuals_assigned' => ''
        ]);

        return redirect('/manage-users');
    }

    
}
