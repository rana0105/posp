<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlet;

class OutletController extends Controller
{
    
    public function index()
    {
        $outlets = Outlet::all();
        return view('backend.outlet.index')->withOut($outlets);
    }

    
    public function create()
    {
        return view('backend.outlet.create');
    }

    
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'outlet_name' => '',
            'outlet_contact' => '',
            'outlet_address' => '',
            'outlet_status' => ''
            ]);

        $outlet = new Outlet;

        $outlet->out_name = $request->outlet_name;
        $outlet->out_contact = $request->outlet_contact;
        $outlet->out_address = $request->outlet_address;
        $outlet->status = $request->status;

        $outlet->save();
        return redirect()->route('outlets.index')->with('success', 'Data have been save !');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $outlet = Outlet::find($id);
        return view('backend.outlet.edit')->withOutlet($outlet);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'outlet_name' => '',
            'outlet_contact' => '',
            'outlet_address' => '',
            'outlet_status' => ''
            ]);

        $outlet = Outlet::find($id);

        $outlet->out_name = $request->outlet_name;
        $outlet->out_contact = $request->outlet_contact;
        $outlet->out_address = $request->outlet_address;
        $outlet->status = $request->status;

        $outlet->save();
        return redirect()->route('outlets.index')->with('success', 'Data have been Updated !');
    }

    
    public function destroy($id)
    {
        $outlet = Outlet::find($id);
        $outlet->delete();
        return redirect()->route('outlets.index')->with('success', 'Data have been Deleted !');
    }
}
