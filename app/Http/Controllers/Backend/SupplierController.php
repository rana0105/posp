<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use Storage;
use Image;
use Intervention\Image\ImageManager;

class SupplierController extends Controller
{
    
    public function index()
    {
        $suppliers = Supplier::all();

        return view('backend.supplier.index')->withSuppliers($suppliers);
    }

    
    public function create()
    {
        return view('backend.supplier.create');
    }

    
    public function store(Request $request)
    {

        $this->validate($request, [
            'company_name' => 'required|max:255',
            'supplier_name' => 'required|max:255',
            'email' => 'required|unique:suppliers,email',
            'phone' => 'required|unique:suppliers,phone',
            'p_image' => 'file|required|image|max:2048|min:50'

            ],[

            'company_name.required' => 'Company name is mandatory',
            'supplier_name.required' => 'Supplier name is mandatory',
            'email.unique' => 'Supplier email id is unique, please new email !',
            'phone.unique' => 'Supplier phone id is unique, please new phone !',
            'p_image.required' => ' The image field is required.',
            'p_image.max' => 'The image maximum 2MB.',
            'p_image.min' => 'The image minimum 50KB.',
            ]);

        $images = $request->file('p_image');

        $filename = time().'.'.$images->getClientOriginalExtension();
        $location = public_path('/upload_file/resize_images/'. $filename);
        Image::make($images)->resize(600 , 600)->save($location);


        if($images)
        {
            $supplier = new Supplier;
            
            $supplier->company_name = $request->company_name;
            $supplier->supplier_name = $request->supplier_name;
            $supplier->email = $request->email;
            $supplier->phone = $request->phone;
            $supplier->p_image = $filename;
        
        }

        $supplier->save();

        return redirect()->route('suppliers.index')->with(['success' => 'Data have been successfully save']);

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('backend.supplier.edit')->withSupplier($supplier);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_name' => '',
            'supplier_name' => '',
            'email' => '',
            'phone' => '',
            'p_image' => ''

            ],[

            'email.unique' => 'Supplier email id is unique, please new email !',
            'phone.unique' => 'Supplier phone id is unique, please new phone !',
            'p_image.required' => ' The image field is required.',
            'p_image.max' => 'The image maximum 2MB.',
            'p_image.min' => 'The image minimum 50KB.',
            ]);
       
         
            $images = $request->file('p_image');
            $supplier = Supplier::find($id);
                
            if($images != null) {              
                $filename = time().'.'.$images->getClientOriginalExtension();
                $location = public_path('/upload_file/resize_images/'. $filename);
                Image::make($images)->resize(600 , 600)->save($location);

                $oldFilename = $supplier->p_image;
                $supplier->p_image = $filename;
                Storage::delete($oldFilename);

            } else {
                $supplier->company_name = $request->company_name;
                $supplier->supplier_name = $request->supplier_name;
                $supplier->email = $request->email;
                $supplier->phone = $request->phone;
            }

            $supplier -> save();
            return redirect() -> route('suppliers.index', $supplier->id)->with(['success' => 'Data have been successfully updated !']);    
    }

    
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('suppliers.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
