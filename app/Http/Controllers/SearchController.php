<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }
  

     //Product Autocomplete Ajax Request
    public function autocomplete_product()
    {       
    
        $data = DB::table('products')->select('*')->get();
   
        return response()->json($data);
    }

}
