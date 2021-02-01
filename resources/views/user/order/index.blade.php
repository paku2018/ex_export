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
            <div class="row">
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
                        <form id="orderForm" method="post" action="{{route('seller.order.save')}}">
                            @csrf
                            <input type="hidden" name="id" id="order_id" value="{{isset($order)?$order->id:0}}">
                            <input type="hidden" name="st" id="st" value="{{isset($order)?$order->status:''}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h4>@lang('billing_data')</h4>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="bill_name">@lang('name')</label>
                                            <input type="text" class="form-control" id="bill_name" name="bill_name" value="{{isset($order)?$order->bill_name:''}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="business_name">@lang('business_name')</label>
                                            <input type="text" class="form-control" id="business_name" name="business_name" value="{{isset($order)?$order->business_name:''}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="full_address">@lang('full_address')</label>
                                            <input type="text" class="form-control" id="full_address" name="full_address" value="{{isset($order)?$order->full_address:''}}">
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
                                            <label for="order_desc">@lang('description') <span class="required-label">*</span></label>
                                            <input type="text" class="form-control" id="order_desc" name="order_desc" value="{{isset($order)?$order->order_desc:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="quantity">@lang('quantity') <span class="required-label">*</span></label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{isset($order)?$order->quantity:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="order_count">@lang('number_items') <span class="required-label">*</span></label>
                                            <input type="number" class="form-control" id="order_count" name="order_count" value="{{isset($order)?$order->order_count:''}}" required>
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
                                            <label for="delivery_name">@lang('name') <span class="required-label">*</span></label>
                                            <input type="text" class="form-control" id="delivery_name" name="delivery_name" value="{{isset($order)?$order->delivery_name:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="delivery_address">@lang('address') <span class="required-label">*</span></label>
                                            <input type="text" class="form-control" id="delivery_address" name="delivery_address" value="{{isset($order)?$order->delivery_address:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="delivery_number">@lang('number') <span class="required-label">*</span></label>
                                            <input type="number" class="form-control" id="delivery_number" name="delivery_number" value="{{isset($order)?$order->delivery_number:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="delivery_complement">@lang('complement')</label>
                                            <input type="text" class="form-control" id="delivery_complement" name="delivery_complement" value="{{isset($order)?$order->delivery_complement:''}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="delivery_city">@lang('city') <span class="required-label">*</span></label>
                                            <input type="text" class="form-control" id="delivery_city" name="delivery_city" value="{{isset($order)?$order->delivery_city:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="delivery_state">@lang('state') <span class="required-label">*</span></label>
                                            <input type="text" class="form-control" id="delivery_state" name="delivery_state" value="{{isset($order)?$order->delivery_state:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="delivery_zip">@lang('zip_code') <span class="required-label">*</span></label>
                                            <input type="text" class="form-control" id="delivery_zip" name="delivery_zip" value="{{isset($order)?$order->delivery_zip:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="delivery_neighborhood">@lang('neighborhood') <span class="required-label">*</span></label>
                                            <input type="text" class="form-control" id="delivery_neighborhood" name="delivery_neighborhood" value="{{isset($order)?$order->delivery_neighborhood:''}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="form-group form-show-validation">
                                            <label for="request_at">@lang('request_date') <span class="required-label">*</span></label>
                                            <input type="date" class="form-control" id="request_at" name="request_at" value="{{isset($order)?$order->request_at:''}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator-solid"></div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>@lang('select_transporter2request')</h4>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group form-show-validation">
                                            <label for="transporter">@lang('transporter') (@lang('not_required'))</label>
                                            <select id="transporter" name="transporter_id" class="form-control" {{(isset($order)&&$order->transporter_id!=0)?'disabled':''}}>
                                                <option value="0">@lang('select_transporter')</option>
                                                @foreach($transporters as $one)
                                                    <option value="{{$one->id}}" {{(isset($order)&&$order->transporter_id==$one->id)?'selected':''}}>{{$one->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if(isset($order)&&$order->transporter_id!=0&&($order->status=="pending"||$order->status=="refused"))
                                    <div class="col-12 col-md-4 d-flex align-items-center">
                                        <button type="button" class="btn btn-custom" onclick="cancelOrder({{$order->id}})">@lang('cancel_delivery')</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-custom" id="btn-save" type="button">@lang('save')</button>
                                        <a href="{{route('seller.order.view')}}" class="btn btn-custom-error">@lang('cancel')</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-js')
    <!-- moment JS -->
    <script src="{{asset('assets/js/plugin/moment/moment.min.js')}}"></script>
    <!-- JQuery validate JS -->
    <script src="{{asset('assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>
    <!-- JQuery select2 JS -->
    <script src="{{asset('assets/js/plugin/select2/select2.full.min.js')}}"></script>
    <!-- SweetAlert JS -->
    <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        let path_cancel = '{{route('seller.order.cancel')}}';
        let _token = '{{csrf_token()}}';
    </script>
    <script src="{{asset('user/js/order_index.js')}}"></script>
@endsection
