<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paymethod;

class PaymethodController extends Controller
{
   
    public function index()
    {
        $paymethods = Paymethod::all();
        return view('backend.paymethod.index')->withPay($paymethods);
    }

    
    public function create()
    {
        return view('backend.paymethod.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'pay_name' => 'required|max:255',
            'status' => ''
            ]);

        $paym = new Paymethod;

        $paym->pay_name = $request->pay_name;
        $paym->status = $request->status;

        $paym->save();

        return redirect()->route('paymethods.index')->with('success', 'Data have been save !');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $paym = Paymethod::find($id);
        return view('backend.paymethod.edit')->withPay($paym);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'pay_name' => '',
            'status' => ''
            ]);

        $paym = Paymethod::find($id);

        $paym->pay_name = $request->pay_name;
        $paym->status = $request->status;

        $paym->save();

        return redirect()->route('paymethods.index')->with('success', 'Data have been Updated !');
    }

    
    public function destroy($id)
    {
        $paym = Paymethod::find($id);
        $paym->delete();
        return redirect()->route('paymethods.index')->with('success', 'Data have been Deleted !');
    }
}
