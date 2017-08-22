<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Purchase;
use App\Supplier;
use App\Stock;

class StockController extends Controller
{
   
    public function index()
    {
         $stocks = Stock::all();
        return view('backend.stock.stock')->withStocks($stocks);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $stock = Stock::find($id);
      //  dd($stock);
        $products = Product::all();

        $pro = array();
        foreach ($products as $prod) {
            $pro[$prod->id] = $prod->name;
        }
        return view('backend.stock.edit')->withStocks($stock)->withProds($pro);
    }

    
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $stock = Stock::find($id);
        $stock->product_id = $request->product_id;
        $stock->quantity = $request->quantity;
        $stock->unit_price = $request->unit_price;
       // dd($stock);
        $stock->save();
        return redirect()->route('stocks.index')->with('success', 'Data have been updated !');
    }

    
    public function destroy($id)
    {
        //
    }
}
