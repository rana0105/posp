<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Procategory;

class ProcategoryController extends Controller
{
    
    public function index()
    {
        $procates = Procategory::all();

        return view('backend.category.product.index')->withProcates($procates);
    }

    
    public function create()
    {
        return view('backend.category.product.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:procategories,name'
            ],[
            'name.required' => 'Product category name is mandatory',
            'name.unique' => 'Product category name is unique, please new name !',
            ]);
        $procate = new Procategory;

        $procate->name = $request->name;
        $procate->save();

        return redirect()->route('procategoies.index')->with(['success' => 'Data have been successfully created !']);
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $procate = Procategory::find($id);
        return view('backend.category.product.edit')->withProcate($procate);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ''
            ]);
        $procate = Procategory::find($id);

        $procate->name = $request->name;
        $procate->save();

        return redirect()->route('procategoies.index')->with(['success' => 'Data have been successfully updated !']);
    }

   
    public function destroy($id)
    {
        //dd($id);
        $procate = Procategory::find($id);

        $procate->delete();

        return redirect()->route('procategoies.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
