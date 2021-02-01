@extends('user.layouts.base')

@section('content')
    <div class="container">
        <div class="page-inner orderlist-page">
            <div class="page-header">
                <h4 class="page-title">@lang('request') @lang('list')</h4>
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
                        <a href="#">@lang('request')</a>
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
                                        <th>@lang('seller')</th>
                                        <th>@lang('billing_name')</th>
                                        <th>@lang('business_name')</th>
                                        <th>@lang('full_address')</th>
                                        <th>@lang('description')</th>
                                        <th>@lang('quantity')</th>
                                        <th>@lang('number_items')</th>
                                        <th>@lang('delivery') @lang('name')</th>
                                        <th>@lang('delivery') @lang('address')</th>
                                        <th>@lang('delivery') @lang('number')</th>
                                        <th>@lang('complement')</th>
                                        <th>@lang('city')</th>
                                        <th>@lang('state')</th>
                                        <th>@lang('zip_code')</th>
                                        <th>@lang('neighborhood')</th>
                                        <th>@lang('request_date')</th>
                                        <th>@lang('status')</th>
                                        <th>@lang('operator_key')</th>
                                        <th class="text-center">@lang('action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>
                                                @if(isset($item->seller))
                                                    {{$item->seller->name}}
                                                @else
                                                    {{"Deleted User"}}
                                                @endif
                                            </td>
                                            <td>{{$item->bill_name}}</td>
                                            <td>{{$item->business_name}}</td>
                                            <td>{{$item->full_address}}</td>
                                            <td>{{$item->order_desc}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->order_count}}</td>
                                            <td>{{$item->delivery_name}}</td>
                                            <td>{{$item->delivery_address}}</td>
                                            <td>{{$item->delivery_number}}</td>
                                            <td>{{$item->delivery_complement}}</td>
                                            <td>{{$item->delivery_city}}</td>
                                            <td>{{$item->delivery_state}}</td>
                                            <td>{{$item->delivery_zip}}</td>
                                            <td>{{$item->delivery_neighborhood}}</td>
                                            <td>{{$item->request_at}}</td>
                                            <td class="text-capitalize">{{__($item->status)}}</td>
                                            <td>{{$item->track_key}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('transporter.order.edit',$item->id)}}" type="button" class="btn btn-link btn-primary btn-lg">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
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
    </script>
@endsection
