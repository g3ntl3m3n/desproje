@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Settings</h1>
            </div>
            <div class="box-body">{{$settings->description}}</div>
            <form action="{{route('ninja.update', ['id' => $settings->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Açıklama</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="text" readonly class="form-control" value="{{$settings->description}}">
                 </div>
            </div>
            @if($settings->type=="file")
            <div class="form-group">
                <label>Resim Seç</label>
                <div class="row">
                 <div class="col-xs-12">
                     <input type="file"  class="form-control" name="value" required value="{{$settings->description}}">
                 </div>
            </div>
            @endif

            <div class="form-group">
                <label>İçerik</label>
                <div class="row">
                 <div class="col-xs-12">
                 @if ($settings->type=="text")
                     <input
                      type="text"
                      class="form-control"
                      name="value"
                      value="{{$settings->value}}">
                 @endif
                 @if ($settings->type=="file")
                    <img width="100" src="/images/settings/{{$settings->value}}">
                 @endif
                 @if ($settings->type=="textarea")
                   
                      <textarea class="form-control" name="value" >{{$settings->value}}</textarea>
                 @endif
                 @if ($settings->type=="ckeditor")
                   
                      <textarea class="form-control" id="editor1" name="value" >{{$settings->value}}</textarea>
                 @endif
                 <script>
                 CKEDITOR.replace('editor1');
                 </script>
                 </div>
            </div>
            @if ($settings->type=="file")
                    <input type="hidden" name="old_file" value="{{$settings->value}}">
                 @endif
            <div align="right" class="box-footer">
                <button type="submit" class="btn btn-success">Düzenle</div>
            </div>
            </form>
                
        </div>

@endsection
@section('css') @endsection
@section('js') @endsection