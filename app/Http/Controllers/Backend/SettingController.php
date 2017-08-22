<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Image;

class SettingController extends Controller
{
    
    public function index()
    {
        $settings = Setting::all();
       // dd($settings);
        return view('backend.setting.index')->withSettings($settings);
    }

    
    public function create()
    {
        return view('backend.setting.create');
    }

    
    public function store(Request $request)
    {

        $this->validate($request, [
            'shop_name' => 'required|max:255',
            'curen' => 'required|max:255',
            'taxvat' => 'required|max:255',
            'copy' => 'required|max:255',
            'logo' => 'file|required|image|max:2048|min:50'

            ],[

            'shop_name.required' => 'Company name is mandatory',
            // 'email.unique' => 'Supplier email id is unique, please new email !',
            // 'phone.unique' => 'Supplier phone id is unique, please new phone !',
            // 'p_image.required' => ' The image field is required.',
            'logo.max' => 'The image maximum 2MB.',
            'logo.min' => 'The image minimum 50KB.',
            ]);

        $images = $request->file('logo');

        $filename = time().'.'.$images->getClientOriginalExtension();
        $location = public_path('../../upload_file/resize_images/'. $filename);
        Image::make($images)->resize(600 , 600)->save($location);


        if($images)
        {
            $setting = new Setting;
            
            $setting->shop_name = $request->shop_name;
            $setting->curen = $request->curen;
            $setting->taxvat = $request->taxvat;
            $setting->copy = $request->copy;
            $setting->logo = $filename;
        
        }

        $setting->save();

        return redirect()->route('settings.index')->with(['success' => 'Data have been successfully save']);

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('backend.setting.edit')->withSetting($setting);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'shop_name' => '',
            'curen' => '',
            'taxvat' => '',
            'copy' => '',
            'logo' => ''

            ],[

            'shop_name.required' => 'Company name is mandatory',
            // 'email.unique' => 'Supplier email id is unique, please new email !',
            // 'phone.unique' => 'Supplier phone id is unique, please new phone !',
            // 'p_image.required' => ' The image field is required.',
            'logo.max' => 'The image maximum 2MB.',
            'logo.min' => 'The image minimum 50KB.',
            ]);
       
         
            $images = $request->file('logo');
            $setting = Setting::find($id);
                
            if($images != null) {              
                $filename = time().'.'.$images->getClientOriginalExtension();
                $location = public_path('../../upload_file/resize_images/'. $filename);
                Image::make($images)->resize(600 , 600)->save($location);

                $oldFilename = $setting->logo;
                $setting->logo = $filename;
                Storage::delete($oldFilename);

            } else {
                $setting->shop_name = $request->shop_name;
                $setting->curen = $request->curen;
                $setting->taxvat = $request->taxvat;
                $setting->copy = $request->copy;
            }

            $setting -> save();
            return redirect() -> route('settings.index', $setting->id)->with(['success' => 'Data have been successfully updated !']);    
    }

    
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        return redirect()->route('settings.index')->with(['success' => 'Data have been successfully deleted !']);
    }
}
