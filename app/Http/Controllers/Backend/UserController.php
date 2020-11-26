<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('backend.users.index', compact('data'));
    }

    public function sortable(){
        foreach($_POST['item'] as $key => $value){
       
            $user = User::find(intval($value));
            $user->must=intval($key);
            $user->save();
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
        return view('backend.users.create');
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
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|Min:6',
                    'file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
                ]);
            $file_name = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/users'), $file_name);
            $request->file = $file_name;
        }
        $products = User::insert(
            [
                'name' => $request->name,
                'email'  => $request->email,
                'file'  => $file_name,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]
            );

        if ($products){
            return redirect(route('user.index'))->with('Success', 'User ekleme başarılı..');
            
        }else{
            return back()->with('Error', 'User ekleme başarısız oldu!');
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
       
        $users = User::where('id', $id)->first();
        return view('backend.users.edit')->with('users', $users);

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
        if($request->hasFile('file')){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|Min:6',
                'file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);
            $file_name = uniqid().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('images/users'), $file_name);
            $request->file = $file_name;
        }
        
        $users = User::where('id', $id)->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'file'  => $file_name,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
        if($users){
            $path = 'images/users/'.$request->old_file;
            if(file_exists($path)){
                @unlink(public_path($path));
            }
            return redirect(route('user.index'))->with('Success', "Success");
        }
        return redirect(route('user.index'))->with('Error', "Error");    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(intval($id));
        if($user->delete()){
            echo 1;
        }else echo 2;
    }
}
