<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Products::all()->sortBy('must');
        return view('backend.products.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(strlen($request->slug)>3){
            $slug = Str::slug($request->slug);
        }else{
            $slug = Str::slug($request->title);
        }

        if($request->hasFile('file')){
            $request->validate(
                [
                    'title' => 'required',
                    'content' => 'required',
                    'file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]);
            $file_name = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/products'), $file_name);
            $request->file = $file_name;
        }
        $products = Products::insert(
            [
                'title' => $request->title,
                'slug'  => $slug, //x
                'file'  => $file_name, //x
                'content' => $request->content,
                'status' => $request->status
            ]
            );

        if ($products){
            return redirect(route('products.index'))->with('Success', 'Ürün ekleme başarılı..');
            
        }else{
            return back()->with('Error', 'Ürün ekleme başarısız oldu!');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find(intval($id));
        if($product->delete()){
            echo 1;
        }else echo 2;
    }
    public function sortable(){
        foreach($_POST['item'] as $key => $value){
       
            $products = Products::find(intval($value));
            $products->must=intval($key);
            $products->save();
        }
        echo true;
    }
}
