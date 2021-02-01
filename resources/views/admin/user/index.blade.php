@extends('user.layouts.base')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">@lang('user') @lang('list')</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">@lang('user')</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">@lang('list')</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title">@lang('information')</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dt_orders" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>@lang('ID')</th>
                                        <th>@lang('name')</th>
                                        <th>@lang('email')</th>
                                        <th>@lang('role')</th>
                                        <th>@lang('country')</th>
                                        <th class="text-center">@lang('action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td class="text-capitalize">{{$item->role}}</td>
                                            <td>{{$item->country_code=="br"?__("brazil"):__("argentina")}}</td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    <a href="{{route('admin.user.edit',$item->id)}}" type="button" class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" onclick="delUser({{$item->id}})" class="btn btn-link btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <!-- Datatable JS -->
    <script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>
    <!-- SweetAlert JS -->
    <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $('#dt_orders').DataTable({
            "pageLength": 5,
        });
        function delUser(id) {
            swal({
                title: '@lang('sure_delete')?',
                text: "@lang('user_delete_permanently')",
                type: 'question',
                icon: 'warning',
                buttons:{
                    confirm: {
                        text : '@lang('yes')',
                        className : 'btn btn-custom'
                    },
                    cancel: {
                        visible: true,
                        text : '@lang('cancel')',
                        className: 'btn btn-custom-error'
                    }
                }
            }).then((confirmed) => {
                if (confirmed) {
                    let formData = new FormData();
                    let _token = '{{csrf_token()}}';
                    let path = '{{route('admin.user.delete')}}'
                    formData.append('id',id);
                    formData.append('_token',_token);
                    $.ajax({
                        url: path,
                        type: 'post',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            if(response.result){
                                location.reload();
                            }else{
                                swal("@lang('ops_user_delete')", {
                                    icon: "error",
                                    buttons : {
                                        confirm : {
                                            className: 'btn btn-custom-error'
                                        }
                                    }
                                });
                            }
                        },
                    });
                }
            });
        }
    </script>
@endsection
