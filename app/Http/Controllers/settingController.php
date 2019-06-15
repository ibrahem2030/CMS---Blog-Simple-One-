<?php

namespace CMS\Http\Controllers;

use Illuminate\Http\Request;
use CMS\Setting;
use CMS\Category;

class settingController extends Controller
{

    public function update(Request $request){

    	$request->validate([
            "blog_name" => "required",
            "phone_num" => "required",
            "blog_name" => "required",
            "address" => "required"
        ]);


    	$setting = Setting::first();
         $setting->blog_name = $request->blog_name;
         $setting->phone_num = $request->phone_num; 
         $setting->blog_name = $request->blog_name;
         $setting->address = $request->address;

         $setting->save();

         return redirect()->back();
    }

    public function index(){
    	$settings = Setting::first();
        $categories = Category::first();

    	return view('settings.index')->with('settings', $settings);
    }
}
