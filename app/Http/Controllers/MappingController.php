<?php

namespace App\Http\Controllers;

use App\Models\Table;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use DB;
use Log;

class MappingController extends Controller
{

    public function show(){  
    
        $tables = Table::all();
             
    
            return view('admin.mapping.index', [
                'tables' => $tables,            
            ]);
        }


    public function create_inside(Request $request){

        $position = $request->input('position');
        $table_number = $request->input('table_number');

        $new_table = new Table([
            'table_number' => $table_number,
            'table_id' => $table_number.Str::random(4),
            'section' => '1',
            'top'    => '0px',
            'left'    => '0px',
            'position' => $position,
            'status' => 'active',  
        ]);

        $new_table->save();
        
        
        return redirect('/show-tables')->with('success', 'Successfully Added New Table');

    }

    public function create_outside(Request $request){

        $position = $request->input('position');
        $table_number = $request->input('table_number');

        $new_table = new Table([
            'table_number' => $table_number,
            'table_id' => $table_number.Str::random(4),
            'section' => '1',
            'top'    => '0px',
            'left'    => '0px',
            'position' => $position,
            'status' => 'active',  
        ]);

        $new_table->save();

        return redirect('/show-tables')->with('success', 'Successfully Added New Table');

    }    

    public function store(Request $request){                

        $tables = Table::all();
        $total_table = Table::all()->count();

        $table_number = implode (",", $request->input('table_number',[]));
        $top = implode (",", $request->input('top',[]));
        $left = implode (",", $request->input('left',[]));     
        
        $top = explode (",", $top);        
        $left = explode (",", $left);            
      
            foreach($tables as $table){               

                $update_table = DB::table('tables')
                         ->where('table_number', $table->table_number)
                         ->update([
                        'top' => $top[$table->table_number - 1],                                                                     
                        'left' => $left[$table->table_number - 1],                                                                     
                ]);                                   

            }

    
    }

    public function reset(Request $request){
        
        $update_table = DB::table('tables')
                         ->where('table_number', $request->input('table_number'))
                         ->update([
                        'top' => '0px',                                                                     
                        'left' => '0px',                                                                     
                ]);

        return redirect('/show-tables')->with('success', 'Table Successfully Reset !');
                                
    }

    public function delete(Request $request){

        $delete_table = DB::table('tables')
                         ->where('table_number', $request->input('table_number'))
                         ->delete();

        return redirect('/show-tables')->with('success', 'Table Successfully Deleted!');                 
    }

    //=============================
    //Ajax Requests
    //=============================

    public function get(){
        $tables = DB::table('tables')->get();       

        return response()->json($tables, 200);
    }

}
