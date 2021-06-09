<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MappingController extends Controller
{
    public function edit(Request $request){
        $dragposition = $_GET['dragposition'];
        $resposition = $_GET['resposition'];
        $dragposition = explode(',',$dragposition);
        $resposition = explode(',',$resposition);   

    }
}
