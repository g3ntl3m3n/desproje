<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Settings;
use App;

class DefaultIndexController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);

        $data['blogs'] = Blog::orderBy('id', 'desc')->take(3)->get();
        $data['phone'] = Settings::where('description', "phone")->first();
       
        return view('front.default.index', compact('data'));
    }
    


}
