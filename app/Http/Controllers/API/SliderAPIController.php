<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;


class SliderAPIController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return response()->json($slider);
    }
}
