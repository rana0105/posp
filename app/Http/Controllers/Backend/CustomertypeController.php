<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customertype;

class CustomertypeController extends Controller
{
    
    public function index()
    {
        $types = Customertype::all();

        return view('backend.customertype.index')->withTypes($types);
    }

    
    public function create()
    {
        return view('backend.customertype.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_name' => 'required|max:255'
            ],[
            'type_name.required' => 'Customer type name is required',
            ]);

        $type = new Customertype;

        $type->type_name = $request->type_name;

        $type->save();

        return redirect()->route('customertypes.index')->with('success', 'Data have been succesfully save');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $type = Customertype::find($id);
        return view('backend.customertype.edit')->withType($type);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type_name' => 'required|max:255'
            ],[
            'type_name.required' => 'Customer type name is required',
            ]);

        $type = Customertype::find($id);

        $type->type_name = $request->type_name;

        $type->save();

        return redirect()->route('customertypes.index')->with('success', 'Data have been succesfully updated');
    }

    
    public function destroy($id)
    {
        $type = Customertype::find($id);

        $type->delete();

        return redirect()->route('customertypes.index')->with('success', 'Data have been succesfully deleted');
    }
}
