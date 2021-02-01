@extends('user.layouts.base')

@section('page-css')

@endsection

@section('content')
    <div class="container">
        <div class="page-inner order-page">
            <div class="page-header">
                <h4 class="page-title">{{isset($order)?__('edit_order'):__('create_order')}}</h4>
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
                        <a href="#">@lang('order')</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{isset($order)?__('edit'):__('create')}}</a>
                    </li>
                </ul>
            </div>
            <div class="row transporter-order">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-title">@lang('information')</div>
                            @if(isset($order))
                                <div class="status d-flex align-items-center">
                                    <div class="status-mark mr-1 mr-md-2"></div>
                                    <label class="status-text text-capitalize" id="status">{{__($order->status)}}</label>
                                </div>
                            @endif
                        </div>
                        <input type="hidden" name="id" id="order_id" value="{{isset($order)?$order->id:0}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>@lang('status')</h4>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="seller_name">@lang('seller') @lang('name') </label>
                                        <input type="text" class="form-control" id="seller_name" name="seller_name" value="{{isset($order->seller)?$order->seller->name:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="status">@lang('status') </label>
                                        <input type="text" class="form-control text-capitalize" id="status" name="status" value="{{isset($order->status)?$order->status:''}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="separator-solid"></div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>@lang('billing_data')</h4>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="bill_name">@lang('name') </label>
                                        <input type="text" class="form-control" id="bill_name" name="bill_name" value="{{isset($order)?$order->bill_name:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="business_name">@lang('business_name') </label>
                                        <input type="text" class="form-control" id="business_name" name="business_name" value="{{isset($order)?$order->business_name:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="full_address">@lang('full_address') </label>
                                        <input type="text" class="form-control" id="full_address" name="full_address" value="{{isset($order)?$order->full_address:''}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="separator-solid"></div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>@lang('sales_order_items')</h4>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="order_desc">@lang('description') </label>
                                        <input type="text" class="form-control" id="order_desc" name="order_desc" value="{{isset($order)?$order->order_desc:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="quantity">@lang('quantity') </label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{isset($order)?$order->quantity:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="order_count">@lang('number_items') </label>
                                        <input type="number" class="form-control" id="order_count" name="order_count" value="{{isset($order)?$order->order_count:''}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="separator-solid"></div>
                            <div class="row">
                                <div class="col-12">
                                    <h4>@lang('delivery_data')</h4>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_name">@lang('name') </label>
                                        <input type="text" class="form-control" id="delivery_name" name="delivery_name" value="{{isset($order)?$order->delivery_name:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_address">@lang('address') </label>
                                        <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="{{isset($order)?$order->delivery_address:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_number">@lang('number') </label>
                                        <input type="number" class="form-control" id="delivery_number" name="delivery_number" value="{{isset($order)?$order->delivery_number:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_complement">@lang('complement') </label>
                                        <input type="text" class="form-control" id="delivery_complement" name="delivery_complement" value="{{isset($order)?$order->delivery_complement:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_city">@lang('city') </label>
                                        <input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{isset($order)?$order->delivery_city:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_state">@lang('state') </label>
                                        <input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{isset($order)?$order->delivery_state:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_zip">@lang('zip_code') </label>
                                        <input type="text" class="form-control" id="delivery_zip" name="delivery_zip" value="{{isset($order)?$order->delivery_zip:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="delivery_neighborhood">@lang('neighborhood') </label>
                                        <input type="text" class="form-control" id="delivery_neighborhood" name="delivery_neighborhood" value="{{isset($order)?$order->delivery_neighborhood:''}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-group form-show-validation">
                                        <label for="request_at">@lang('request_date') </label>
                                        <input type="date" class="form-control" id="request_at" name="request_at" value="{{isset($order)?$order->request_at:''}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    @if($order->status=="pending")
                                        <button class="btn btn-success" id="btn-accept" type="button" onclick="update('accepted')">@lang('accept')</button>
                                        <button class="btn btn-custom" id="btn-refuse" type="button" onclick="update('refused')">@lang('refuse')</button>
                                    @elseif($order->status=="accepted")
                                        <button class="btn btn-custom" id="btn-deliver" type="button" onclick="update('delivered')">@lang('delivered')</button>
                                    @endif
                                    <a href="{{route('transporter.order.view')}}" class="btn btn-custom-error">@lang('back')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <!-- moment JS -->
    <script src="{{asset('assets/js/plugin/moment/moment.min.js')}}"></script>
    <!-- JQuery Datepicker JS -->
    <script src="{{asset('assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>
    <!-- JQuery select2 JS -->
    <script src="{{asset('assets/js/plugin/select2/select2.full.min.js')}}"></script>
    <!-- SweetAlert JS -->
    <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        let _token = '{{csrf_token()}}';
        let path = '{{route('transporter.order.change')}}';
        let st = {{session()->has('status_update')?1:0}};
        $(document).ready(function () {
            if(st==1)
                swal("@lang('done')!", "@lang('updated_request')", {
                    icon : "success",
                    buttons: {
                        confirm: {
                            className : 'btn btn-custom'
                        }
                    },
                });
        })

        function update(status) {
            swal({
                title: '@lang('are_you_sure')?',
                text: '@lang('change_status_request')',
                type: 'question',
                icon: 'info',
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
                    let id = $('#order_id').val();
                    formData.append('id',id);
                    formData.append('_token',_token);
                    formData.append('status',status);
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
                                swal("@lang('ops_update_request')", {
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
