<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductAPIController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return response()->json($products);
    }

}
