<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index(){
        $data['adminSettings'] = Settings::all()->sortBy('must');
        return view('backend.settings.index', compact('data'));
    }

    public function sortable(){
        foreach($_POST['item'] as $key => $value){
       
            $settings = Settings::find(intval($value));
            $settings->must=intval($key);
            $settings->save();
        }
        echo true;
    }

    public function destroy($id){
        $settings = Settings::find($id);
        if(empty($settings))
            return;
        if($settings->delete()){
            return back()->with('Success', "Its done mate");
        }
        return back()->with('Error', "Alright its done mate");

    }

    public function edit($id){
        $settings = Settings::where('id', $id)->first();
        return view('backend.settings.edit')->with('settings', $settings);
    }

    public function update(Request $request, $id){
        if($request->hasFile('value')){
            $request->validate([
                'value' => 'required|image|mimes:jpg,png,jpeg,ico|max:2048'
            ]);
            $file_name = uniqid().'.'.$request->value->getClientOriginalExtension();
            $request->value->move(public_path('images/settings'), $file_name);
            $request->value = $file_name;
           
        }
        $settings = Settings::where('id', $id)->update(
            [
                "value" => $request->value 
            ]
        );
        if($settings){
            $path = 'images/settings/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
            return back()->with("Success", "Success");
        }
        return back()->with("Error", "Error");

    }
}
