@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Messages</h1>
            </div>
            <div class="box-body">Message</div>
           
                <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Title</title>
                <th>Message</th>
                <th></th>
                <th></th>
                </tr>
                <tbody id="sortable">
                @foreach($data['messages'] as $data)

                <tr id="item-">
                   
                    <td class="sortable"> {{$data->name}}</td>
                    <td class="sortable"> {{$data->phone}} </td>
                    <td> {{$data->email}} </td>     
                    <td> {{$data->title}} </td>
                    <td> {{substr($data->message,0, 50)}} </td>       
                   
                   
               
                    
                    <td></td>

                    <td>
                   
                    <a href="javascript:void(0)"><i id="@php  echo $data->id @endphp" class="fa fa-trash-o"></td>
                   
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
                        url: "",
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
            console.log(destroy_id);

            alertify.confirm("Do you want to delete it?",
            function(){
                $.ajax({
                    type: "DELETE",
                    url: "/ninja/messages/"+destroy_id,
                    success: function(msg){
                        if(msg){
                            $("#item-"+destroy_id).remove();
                            alertify.success("Deleted");
                        }else{
                            alertify.error("Error");
                        }
                    }
                });
            },
            function(){
                alertify.error("Error while deleting");
            }
            );
        });
    </script>
@endsection
@section('css') @endsection
@section('js') @endsection