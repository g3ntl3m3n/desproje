<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Settings;
use App;
class AboutController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);

        $data['galery'] = Galeri::orderBy('id', 'desc')->take(3)->get();
        $data['phone'] = Settings::where('description', "phone")->first();

        return view('front.about.index', compact('data'));
    }
}
