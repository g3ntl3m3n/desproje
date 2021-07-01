<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Messages;
use App;

class ContactController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);
        $data['phone'] = Settings::where('description', 'phone')->first();
        return view('front.contact.index', compact('data'));
    }


    public function store(Request $request)
    {
       
       
        $request->validate(
            [
                'name' => 'required|string|max:60',
                'email' => 'required|email|max:60',
                'title' => 'required|string|max:60',
                'phone' => 'required|string|max:11',
                'message' => 'required|string'
            ]);
        
        $messages = Messages::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'phone' => $request->phone,
            'message' => $request->message
        ]);
      
        
        if($messages){
            return back()->with('Success', "Mesajınız Başarıyla İletildi..");
        }
        else{
            return back()->with("Error", "Mesaj Göndermede Bir Hata Oluştu..");
        }

    }

    public function destroy($id)
    {
        $message = Messages::find(intval($id));
        if($blog->delete()){
            echo 1;
        }
        echo 2;
    }
}
