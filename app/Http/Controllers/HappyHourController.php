<?php

namespace App\Http\Controllers;

use App\Models\HappyHour;
use Illuminate\Http\Request;

use DB;

class HappyHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.happyhour');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function show(HappyHour $happyHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function edit(HappyHour $happyHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = request()->except(['_token','id']);       
        
        $updates = array_filter($data); 

        $exists = DB::table('happy_hours')->where('id','=',1)->first();

        if ($exists != null) {
            $update_item = DB::table('happy_hours')->where('id','=',1)
            ->update($updates);
        }else{
            $new = new HappyHour([
                'start' => $request->start,
                'end' => $request->end
            ]);
            $new->save();
        }                                     

        return redirect('/inventory')->with('success', 'Successfully Updated Happy Hour Timings.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(HappyHour $happyHour)
    {
        //
    }
}
