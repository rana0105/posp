<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PackCate;
use App\Product;
use App\Package;
use App\PackageStock;

class PackageController extends Controller
{
    
    public function index()
    {
       
        $packages = Product::where('status', 0)->get();
        return view('backend.package.index')->withPackages($packages);
    }

    
    public function create()
    {
        $product = Product::where('status', 1)->get();
        return view('backend.package.create')->withProduct($product);
    }

    
    public function store(Request $request)
    {

        $this->validate($request, [
            'date' => 'required|date',
            'pakage_name' => 'required',
            'pqtn' => 'required',
            'pat_price' => 'required'
            ],[
            'date.required' => 'Date must be input!',
            'pakage_name.required' => 'Package name must be input!',
            'pname.required' => 'Product name must be input!',
            'pqtn.required' => 'Quantity must be input!',
            'u_price.required' => 'Unit price must be input!'
            ]);

        $package = new Package;
        $status = 0;
        $actinact = 1;
        $package->date = $request->date;
        $package->pakage_name = $request->pakage_name;
        $package->pat_price = $request->pat_price;
        $package->status = $status;
        $quantity = $request->pqtn;

        $package->save();

        $pac = new Product;
        $tax = 0;
        $dis = 0;
        $quan = 1;
        $pac->name = $request->pakage_name;
        $pac->tax = $tax;
        $pac->discount = $dis;
        $pac->quantity = $quan;
        $pac->sale_price = $request->pat_price;
        $pac->status = $status;
        $pac->actinact = $actinact;

        $pac->save();

        if($pac->save()){

            foreach ($request->pname as $key => $product) {
                
                    $pstock = new PackageStock();
                    $pstock->propac_id = $pac->id;
                    $pstock->package_id = $package->id;
                    $pstock->product_id = $product;
                    $pstock->pquantity = $quantity[$key];
                    $pstock->save();              
            }

        }

        return redirect()->route('packages.index')->with('success' , 'Data have been save!');
    }

    
    public function show($id)
    {
       
    }

    
    public function edit($id)
    {
         $product = Product::find($id);
         return view('backend.package.edit')->withProduct($product);
    }

    
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
        $product->actinact = $request->actinact;
        

        $product->save();
        return redirect()->route('packages.index')->with('success' , 'Data have been updated!');
    }

    
    public function destroy($id)
    {
        //
    }
}
