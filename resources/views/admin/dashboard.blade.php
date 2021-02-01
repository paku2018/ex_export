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
                        <h5 class="text-white op-7 mb-2">@lang('goldfy_admin_dashboard')</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">@lang('user') @lang('statistics')</div>
                                <div class="card-tools">
                                    <a href="{{route('admin.user.view')}}" class="btn btn-info btn-border btn-round btn-sm mr-2">
												<span class="btn-label">
													<i class="icon-eye"></i>
												</span>
                                        @lang('view')
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="pieChart" style="width: 50%; height: 50%"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
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
                                    <div id="circles-cancel"></div>
                                    <h6 class="fw-bold mt-3 mb-0">@lang('cancelled')</h6>
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
            id:'circles-cancel',
            radius:45,
            value:{{$cancel}},
            maxValue:total,
            width:7,
            text: '{{$cancel}}',
            colors:['#f1f1f1', '#d91efa'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        let pieChart = document.getElementById('pieChart').getContext('2d');
        let myPieChart = new Chart(pieChart, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [{{$sellers}}, {{$transporters}}],
                    backgroundColor :["#1d7af3","#f3545d"],
                    borderWidth: 0
                }],
                labels: ['@lang('seller'):'+{{$sellers}}, '@lang('transporter'):'+{{$transporters}}]
            },
            options : {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position : 'bottom',
                    labels : {
                        fontColor: 'rgb(154, 154, 154)',
                        fontSize: 11,
                        usePointStyle : true,
                        padding: 20
                    }
                },
                pieceLabel: {
                    render: 'percentage',
                    fontColor: 'white',
                    fontSize: 14,
                },
                tooltips: false,
                layout: {
                    padding: {
                        left: 20,
                        right: 20,
                        top: 20,
                        bottom: 20
                    }
                }
            }
        })
    </script>
@endsection
