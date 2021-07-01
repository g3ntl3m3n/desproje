<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Settings;
use App;

class ServicesController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);
        
        $data['phone'] = Settings::where('description', 'phone')->first();
        return view('front.services.index', compact('data'));
    }
}
