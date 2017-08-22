<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('backend.category.brand.index')->withBrands($brands);
    }

    
    public function create()
    {
        return view('backend.category.brand.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:brands,name'
            ],[
            'name.required' => 'Product brand name is mandatory',
            'name.unique' => 'Product brand name is unique, please new name !',
            ]);
        $brand = new Brand;

        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brands.index')->with(['success' => 'Data have been successfully created !']);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.category.brand.edit')->withBrand($brand);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ''
            ]);
        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->save();

        return redirect()->route('brands.index')->with(['success' => 'Data have been successfully updated !']);
    }

   
    public function destroy($id)
    {
        //dd($id);
        $brand = Brand::find($id);

        $brand->delete();

        return redirect()->route('brands.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
