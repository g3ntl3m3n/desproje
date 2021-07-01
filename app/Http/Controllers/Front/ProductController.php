<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App;

class ProductController extends Controller
{
    public function index($lang){
        App::setLocale($lang);
        $data['products'] = Products::all()->sortBy('must');
        $data['categories'] = Category::all()->sortBy('desc');
        return view('front.product.index', compact('data'));
    }

    public function category($lang, $slug){
        App::setLocale($lang);
        $data['categories'] = Category::all()->sortBy('desc');
    
        $data['products'] = Products::where('category', $slug)->get();  
        //dd($data['products']);
        return view('front.product.category', compact('data'));
    }
}
