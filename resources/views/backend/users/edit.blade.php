@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Edit User</h1>
            </div>
            <div class="box-body"></div>
            <form action="
            {{route('user.update', 
            ['id' => $users->id])}}" 
            method="post"
            enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label>Image</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="file"
                      class="form-control"
                      name="file"
                      required value="">
                 </div>
            </div>


            <div class="form-group">
                <label>Name</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="text" required name="name" class="form-control" placeholder="{{$users->name}}">
                 </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="email" name="email" class="form-control" placeholder="{{$users->email}}" >
                 </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="password" name="password" class="form-control" placeholder="Enter new password.." >
                 </div>
            </div>
           
        
            <div class="form-group">
                <label>Role</label>
                <div class="row">
                 <div class="col-xs-12">
                      
                   <select name="role" class="form-control    ">
                   <option value="1">Admin</option>
                   <option value="0">User</option>

                   </select>
               
                 <script>
                 CKEDITOR.replace('editor1');
                 </script>
                 </div>
            </div>

            <input type="hidden" name="old_file" value="{{$users->file}}">

            <div align="right" class="box-footer">
                <button type="submit" class="btn btn-success">Update</div>
            </div>
            </form>
                
        </div>

@endsection
@section('css') @endsection
@section('js') @endsection