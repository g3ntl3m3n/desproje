<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Settings;
use App;
class BlogController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);

        $data['blogs'] = Blog::orderBy('id', 'desc')->get();
        $recent['blogs'] = Blog::orderBy('id', 'desc')->take(10)->get();
        $data['phone'] = Settings::where('description', "phone")->first();

        return view('front.blog.index', compact('data', 'recent'));
    }
    
    public function detail($lang, $slug)
    {
        App::setLocale($lang);

        $data = Blog::where('slug', $slug)->first();
        $recent['blogs'] = Blog::orderBy('id', 'desc')->take(10)->get();
        $data['phone'] = Settings::where('description', "phone")->first();

        return view('front.blog.single', compact('data', 'recent'));
    }
}
