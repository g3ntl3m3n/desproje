@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Update Product</h1>
            </div>
            <div class="box-body"></div>
            <form
                action="{{route('products.store')}}"
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
                <label>Title</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="text" required name="title" class="form-control" placeholder="{{ $products->title }}">
                 </div>
            </div>

            <div class="form-group">
                <label>Slug</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="text" name="slug" class="form-control" placeholder="{{ $products->slug }} ">
                 </div>
            </div>
           
            <div class="form-group">
                <label>İçerik</label>
                <div class="row">
                 <div class="col-xs-12">
                      
                     <textarea class="form-control" id="editor1"  name="content" required>{{ $products->content }}</textarea>
               
                 <script>
                 CKEDITOR.replace('editor1');
                 </script>
                 </div>
            </div>
            <div class="form-group">
                <label>Status</label>
                <div class="row">
                 <div class="col-xs-12">
                      
                   <select name="status" class="form-control    ">
                   <option value="1">Publish</option>
                   <option value="">Draft</option>

                   </select>
               
                 <script>
                 CKEDITOR.replace('editor1');
                 </script>
                 </div>
            </div>
            <input type="hidden" name="old_file" value="{{$products->file}}">

            <div align="right" class="box-footer">
                <button type="submit" class="btn btn-success">Update</div>
            </div>
            </form>
                
        </div>

@endsection
@section('css') @endsection
@section('js') @endsection