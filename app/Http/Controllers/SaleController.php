<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function today()
    {
        $todays_sales = Sale::whereDate('created_at', Carbon::today())->paginate(25);
        $kitchen = 0;
        $cocktailbar = 0;
        $mainbar = 0;
        $total = 0;

        foreach ($todays_sales as $value) {
            $kitchen = $kitchen + (int)$value->kitchen;
            $cocktailbar = $cocktailbar + (int)$value->cocktailbar;
            $mainbar = $mainbar + (int)$value->mainbar;           
            $total = $total + (int)$value->total;           
        }

        return view('admin.sales.index', [
            'sales' => $todays_sales,
            'total' => $total,
            'kitchen' => $kitchen,
            'mainbar' => $mainbar,
            'cocktailbar' => $cocktailbar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $sales = Sale::paginate(25);
        $kitchen = 0;
        $cocktailbar = 0;
        $mainbar = 0;
        $total = 0;

        foreach ($sales as $value) {
            $kitchen = $kitchen + (int)$value->kitchen;
            $cocktailbar = $cocktailbar + (int)$value->cocktailbar;
            $mainbar = $mainbar + (int)$value->mainbar;           
            $total = $total + (int)$value->total;           
        }

        return view('admin.sales.history', [
            'sales' => $sales,
            'total' => $total,
            'kitchen' => $kitchen,
            'mainbar' => $mainbar,
            'cocktailbar' => $cocktailbar
        ]);
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
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
