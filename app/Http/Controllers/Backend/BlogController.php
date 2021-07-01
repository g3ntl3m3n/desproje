<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blog'] = Blog::all()->sortBy('must');
        return view('backend.blog.index', compact('data'));


    }
    public function sortable(){
        foreach($_POST['item'] as $key => $value){
       
            $blogs = Blog::find(intval($value));
            $blogs->must=intval($key);
            $blogs->save();
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
        return view('backend.blog.create');
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
                    'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                    'lang' => 'required'
                ]);
            $file_name = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/blogs'), $file_name);
            $request->file = $file_name;
        }
        $blogs = Blog::create(
            [
                'title' => $request->title,
                'slug'  => $slug, //x
                'file'  => $file_name, //x
                'content' => $request->content,
                'lang'    => $request->lang,
                'status' => $request->status                
            ]
            );

        if ($blogs){
            return redirect(route('blog.index'))->with('Success', 'Blog başarıyla Eklendi');
            
        }else{
            return back()->with('Error', 'Blog ekleme başarısız oldu!');
        }    
    }

    /**
     * Dislay the specified resource.
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
        $blogs = Blog::where('id', $id)->first();
        return view('backend.blog.edit')->with('blogs', $blogs);
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
        //dd($request, $id);
        if($request->hasFile('file')){
            $request->validate([
                'file' => 'required|mimes:jpg,png,jpeg|max:2048'
            ]);
        $file_name = uniqid().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('images/blogs'), $file_name);
        $request->file = $file_name;   
               
        }
        if(strlen($request->slug)>3)
        {
            $slug = Str::slug($request->slug);
        }
        else
        {
            $slug = Str::slug($request->title);
        }
        $blogs = Blog::where('id', $id)->update(
            [
                'title'  => $request->title,
                'file'   => $file_name,
                'content' => $request->content,
                'slug'    => $slug,
                'lang'    => $request->lang,
                'status'    => $request->status
            ]);
        if($blogs){
            $path = "images/blogs".$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
            return redirect(route('blog.index'))->with("Success", "Success");    

        } 
        return redirect(route('blog.index'))->with("Error", "Error");   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find(intval($id));
        if($blog->delete()){
            echo 1;
        }
        echo 2;

    }
}
