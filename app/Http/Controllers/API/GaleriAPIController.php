<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;


class GaleriAPIController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();
        return response()->json($galeri);
    }
}
