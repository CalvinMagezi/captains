<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Log;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::orderBy('created_at','desc')->paginate(50);

        return view('admin.items.inventory', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name = $request->name;
        $unique_id = Str::random(8);
        $description = $request->description;
        $quantity = (int)$request->quantity;        
        $price = (int)$request->price;        
        $hprice = (int)$request->hprice;
        $m_cat = $request->major_category;
        $cat = $request->category;
        $barcode = substr( bin2hex( random_bytes( 8 ) ),  0, 8 ); 

        $new = new Product([
            'name' => $name,
            'unique_id' => $unique_id,
            'barcode' => $barcode,
            'description' => $description,
            'quantity' => $quantity,
            'price' => $price,
            'hprice' => $hprice,
            'major_category' => $m_cat,
            'category' => $cat
        ]);

        $new->save();

        return redirect()->back()->with('success', 'Successfully Created Item');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        return view('admin.items.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = request()->except(['_token','id']);
        
        $item_id = $request->id;
        
        $updates = array_filter($data); 

        $update_auction = Product::where('id','=',$item_id)
                            ->update($updates);

        return redirect('/inventory');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $item = Product::where('id','=',$request->id)->first();
        $item->delete();
        return redirect('/inventory');
    }
}
