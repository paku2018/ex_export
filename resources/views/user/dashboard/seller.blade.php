@extends('user.layouts.base')

@section('page-css')

@endsection

@section('content')
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@lang('welcome_goldfy')</h2>
                        <h5 class="text-white op-7 mb-2">@lang('goldfy_user_dashboard')</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-8 offset-md-2">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">@lang('order') @lang('statistics')</div>
                            <div class="card-category">@lang('total_orders') : {{$total}}</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-deliver"></div>
                                    <h6 class="fw-bold mt-3 mb-0">@lang('delivered')</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-accept"></div>
                                    <h6 class="fw-bold mt-3 mb-0">@lang('accepted')</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-pending"></div>
                                    <h6 class="fw-bold mt-3 mb-0">@lang('pending')</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-refuse"></div>
                                    <h6 class="fw-bold mt-3 mb-0">@lang('refused')</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-inactive"></div>
                                    <h6 class="fw-bold mt-3 mb-0">@lang('inactive')</h6>
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
    <!-- Chart JS -->
    <script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <script>
        let total = {{$total}};
        Circles.create({
            id:'circles-accept',
            radius:45,
            value:{{$accept}},
            maxValue:total,
            width:7,
            text: '{{$accept}}',
            colors:['#f1f1f1', '#2744ff'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-deliver',
            radius:45,
            value:{{$deliver}},
            maxValue:total,
            width:7,
            text: '{{$deliver}}',
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-refuse',
            radius:45,
            value:{{$refuse}},
            maxValue:total,
            width:7,
            text: '{{$refuse}}',
            colors:['#f1f1f1', '#F25961'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-pending',
            radius:45,
            value:{{$pending}},
            maxValue:total,
            width:7,
            text: '{{$pending}}',
            colors:['#f1f1f1', '#f6ad27'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-inactive',
            radius:45,
            value:{{$inactive}},
            maxValue:total,
            width:7,
            text: '{{$inactive}}',
            colors:['#f1f1f1', '#d91efa'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

    </script>
@endsection
