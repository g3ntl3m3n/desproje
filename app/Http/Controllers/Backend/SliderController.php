<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['slider'] = Slider::all()->sortBy('must');
        return view('backend.slider.index', compact('data'));
    }
    public function sortable(){
        foreach($_POST['item'] as $key => $value){
       
            $sliders = Slider::find(intval($value));
            $sliders->must=intval($key);
            $sliders->save();
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
        return view('backend.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->hasFile('file')){
            $request->validate(
                [
                    'file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]);
            $file_name = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/sliders'), $file_name);
            $request->file = $file_name;
        }
        $sliders = Slider::insert(
            [
                'file'  => $file_name, //x
                'status' => $request->status
            ]
            );

        if ($sliders){
            return redirect(route('slider.index'))->with('Success', 'Slider ekleme başarılı..');
            
        }else{
            return back()->with('Error', 'Slider ekleme başarısız oldu!');
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
        $slider = Slider::find(intval($id));
        if($slider->delete()){
            echo 1;
        }
        echo 2;
    }
}
