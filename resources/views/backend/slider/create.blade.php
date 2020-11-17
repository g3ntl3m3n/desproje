@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Add Blog</h1>
            </div>
            <div class="box-body"></div>
            <form
                action="{{route('slider.store')}}"
                method="post"
                enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Resim Seç</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="file"
                      class="form-control"
                      name="file"
                      required value="">
                 </div>
            </div>


           
          
            <div class="form-group">
                <label>Durum</label>
                <div class="row">
                 <div class="col-xs-12">
                      
                   <select name="status" class="form-control">
                   <option value="1">Yayınla</option>
                   <option value="">Yayınlama</option>

                   </select>
               
                 
                 </div>
            </div>


            <div align="right" class="box-footer">
                <button type="submit" class="btn btn-success">Ekle</div>
            </div>
            </form>
                
        </div>

@endsection
@section('css') @endsection
@section('js') @endsection