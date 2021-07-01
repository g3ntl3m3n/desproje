@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">User Settings</h1>
            </div>
            <div class="box-body">User</div>
            <div align="right">
               <a href="{{route('category.create')}}">
                <button type="button" class="btn btn-success">Add</button></a>
            </div>
                <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Status</th>
                <th></th>
                <th></th>

             
                </tr>
                <tbody id="sortable">
                @foreach($data['data'] as $settings)
                <tr id="item-{{$settings->id}}">
                   
                    <td class="sortable">{{$settings->title}}</td>
                    <td class="sortable">{{$settings->description}}</td>
                    <td class="sortable">{{$settings->slug}}</td>
                    
                    <td>{{$settings->status}}</td>
                    <td><a href="{{route('user.edit', ['id' => $settings->id])}}"><i class="fa fa-pencil-square"></td>
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
                        url: "{{route('category.sortable')}}",
                        success: function (msg) {
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

            alertify.confirm("Do you want to delete it?",
            function(){
                $.ajax({
                    type: "DELETE",
                    url: "category/"+destroy_id,
                    success: function(msg){
                        if(msg){
                            $("#item-"+destroy_id).remove();
                            alertify.success("Do you want to delete it?");
                        }else{
                            alertify.error("Error");
                        }
                    }
                });
            },
            function(){
                alertify.error("Error while deleting.");
            }
            );
        });
    </script>
@endsection
@section('css') @endsection
@section('js') @endsection