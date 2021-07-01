@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Add</h1>
            </div>
            <div class="box-body"></div>
            <form
                action="{{route('category.store')}}"
                method="post"
                enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Category Name</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="text" required name="title" class="form-control">
                 </div>
            </div>

            <div class="form-group">
                <label>Category Description</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="text" required name="description" class="form-control">
                 </div>
            </div>

            <div class="form-group">
                <label>Category Slug</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="text" required name="slug" class="form-control">
                 </div>
            </div>


        
            <div class="form-group">
                <label>Status</label>
                <div class="row">
                 <div class="col-xs-12">
                      
                   <select name="status" class="form-control    ">
                   <option value="1">Publish</option>
                   <option value="0">Draft</option>

                   </select>
               
                 
                 </div>
            </div>


            <div align="right" class="box-footer">
                <button type="submit" class="btn btn-success">Add</div>
            </div>
            </form>
                
        </div>

@endsection
@section('css') @endsection
@section('js') @endsection