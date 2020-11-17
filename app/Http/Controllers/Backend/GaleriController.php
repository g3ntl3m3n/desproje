<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Str;



class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['galeri'] = Galeri::all()->sortBy('must');
        return view('backend.galeri.index', compact('data'));
    }

    public function sortable(){
        foreach($_POST['item'] as $key => $value){
       
            $galeri = Galeri::find(intval($value));
            $galeri->must=intval($key);
            $galeri->save();
        }
        echo true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.galeri.create');

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
                    'file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]);
            $file_name = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/galeri'), $file_name);
            $request->file = $file_name;
        }
        $products = Galeri::insert(
            [
                'title_tr' => $request->title_tr,
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'slug'  => $slug,
                'file'  => $file_name, 
                'status' => $request->status
            ]
            );

        if ($products){
            return redirect(route('galeri.index'))->with('Success', 'Resim ekleme başarılı..');
            
        }else{
            return back()->with('Error', 'Resim ekleme başarısız oldu!');
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
        //
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
        $galeri = Galeri::find(intval($id));
        if($galeri->delete()){
            echo 1;
        }else echo 2;
    }
    
}
