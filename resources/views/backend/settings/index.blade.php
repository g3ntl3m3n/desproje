@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Settings</h1>
            </div>
            <div class="box-body">Settings</div>
                <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Content</th>
                <th>Key</th>
                <th>Type</th>
                <th></th>
                <th></th>
                </tr>
                <tbody id="sortable">
                @foreach($data['adminSettings'] as $settings)
                <tr id="item-{{$settings->id}}">
                    <td>{{$settings->id}}</td>
                    <td class="sortable">{{$settings->description}}</td>
                    <td>
                    
                    @if($settings->type =="file")
                        <img width="80" class="img-thumbnail" src="/images/settings/{{$settings->value}}">
                    @else
                        {{$settings->value}}
                    
                    @endif
                    </td>
                    <td>{{$settings->key}}</td>
                    <td>{{$settings->type}}</td>
                    <td><a href="{{route('ninja.edit', ['id' => $settings->id])}}"><i class="fa fa-pencil-square"></td>
                    <td>
                    @if ($settings->delete)
                    <a href="javascript:void(0)"><i id="@php echo $settings->id @endphp" class="fa fa-trash-o"></td>
                    @endif
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
                        url: "{{ route('ninja.sortable') }}",
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
                location.href = "/ninja/settings/delete/" + destroy_id;
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