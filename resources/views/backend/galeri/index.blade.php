@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Gallery Settings</h1>
            </div>
            <div class="box-body">Gallery</div>
            <div align="right">
               <a href="{{route('galeri.create')}}"> <button type="button" class="btn btn-success">Add</button></a>
            </div>
                <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th>Title</th>
                <th>Content</th>
                <th>File</th>
                <th>Status</th>
                <th></th>
                <th></th>
                </tr>
                <tbody id="sortable">
                @foreach($data['galeri'] as $settings)
                <tr id="item-{{$settings->id}}">
                   @if($settings->title_tr)
                    <td class="sortable">{{$settings->title_tr}}</td>
                    @endif
                    @if($settings->title_en)
                    <td class="sortable">{{$settings->title_en}}</td>
                    @endif
                    @if($settings->title_ar)
                    <td class="sortable">{{$settings->title_ar}}</td>
                    @endif

                    <td class="sortable">{{strip_tags($settings->content)}}</td>
                    <td>
                    
                        <img width="80" class="img-thumbnail" src="/images/galeri/{{$settings->file}}">
                
                      
                  
                    </td>
                   
                    <td>
                    @if($settings->status=="1")
                          Published 
                    @else
                        Drafted 
                    @endif     
                    </td>
                    
                    <td>{{$settings->type}}</td>
                    <td><a href="{{route('ninja.edit', ['id' => $settings->id])}}"><i class="fa fa-pencil-square"></td>
                    <td>
                   
                    <a href="javascript:void(0)"><i id="@php echo $settings->id @endphp" class="fa fa-trash-o"></td>
                   
                </tr>
                @endforeach
                </tbody>

                </thead>
                </table>
        </div>
        <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sortable').sortable({
                revert: true,
                handle: ".sortable",
                stop: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        type: "POST",
                        data: data,
                        url: "{{route('galeri.sortable')}}",
                        success: function (msg) {
                            // console.log(msg);
                            if (msg) {
                                alertify.success("Success");
                            } else {
                                alertify.error("Error");
                            }
                        }
                    });

                }
            });
            $('#sortable').disableSelection();

        });
        $(".fa-trash-o").click(function(){
            destroy_id = $(this).attr('id');

            alertify.confirm("r u sure mate",
            function(){
                $.ajax({
                    type: "DELETE",
                    url: "galeri/"+destroy_id,
                    success: function(msg){
                        if(msg){
                            $("#item-"+destroy_id).remove();
                            alertify.success("Success");
                        }else{
                            alertify.error("Error");
                        }
                    }
                });
            },
            function(){
                alertify.error("alright mate");
            }
            );
        });
    </script>
@endsection
@section('css') @endsection
@section('js') @endsection