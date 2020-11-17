<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//my default controller for base

class DefaultController extends Controller
{
    public function index(){

        return view('backend.default.index');
    }
}
