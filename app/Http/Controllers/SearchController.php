<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Product Autocomplete
    public function autocomplete_product(Request $request)
    {
        $data = Product::select("name")
                ->where("name","LIKE","%{$request->query}%")
                ->get();
   
        return response()->json($data);
    }

}
