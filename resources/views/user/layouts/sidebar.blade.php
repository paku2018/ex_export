<!-- Sidebar -->
@php
    $main = Request::segment(1);
    $link = Request::segment(2);
    $sublink = Request::segment(3);
@endphp
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item {{$link=="dashboard"?'active':''}}">
                    <a href="{{url('/')}}">
                        <i class="fas fa-home"></i>
                        <p>@lang('dashboard')</p>
                    </a>
                </li>
                <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
                    <h4 class="text-section">@lang('manage')</h4>
                </li>
                <li class="nav-item {{$main=="profile"?'active':''}}">
                    <a href="{{route('profile.index')}}">
                        <i class="fas fa-user-edit"></i>
                        <p>@lang('my_profile')</p>
                    </a>
                </li>
                @if($user->role=="seller")
                <li class="nav-item {{$link=="order"?'active':''}}">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>@lang('orders')</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{$link=="order"?'show':''}}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{$link=="order"&&$sublink=="view"?'active':''}}">
                                <a href="{{route('seller.order.view')}}">
                                    <span class="sub-item">@lang('list')</span>
                                </a>
                            </li>
                            <li class="{{$link=="order"&&$sublink=="create"?'active':''}}">
                                <a href="{{route('seller.order.create')}}">
                                    <span class="sub-item">@lang('create')</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @elseif($user->role=="transporter")
                    <li class="nav-item {{$link=="order"?'active':''}}">
                        <a href="{{route('transporter.order.view')}}">
                            <i class="fas fa-registered"></i>
                            <p>@lang('request')</p>
                        </a>
                    </li>
                @elseif($user->role=="admin")
                    <li class="nav-item {{$link=="order"?'active':''}}">
                        <a href="{{route('admin.order.view')}}">
                            <i class="fas fa-layer-group"></i>
                            <p>@lang('orders')</p>
                        </a>
                    </li>
                    <li class="nav-item {{$link=="user"?'active':''}}">
                        <a data-toggle="collapse" href="#user">
                            <i class="fas fa-user-friends"></i>
                            <p>@lang('users')</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{$link=="user"?'show':''}}" id="user">
                            <ul class="nav nav-collapse">
                                <li class="{{$link=="user"&&$sublink=="view"?'active':''}}">
                                    <a href="{{route('admin.user.view')}}">
                                        <span class="sub-item">@lang('list')</span>
                                    </a>
                                </li>
                                <li class="{{$link=="user"&&$sublink=="create"?'active':''}}">
                                    <a href="{{route('admin.user.create')}}">
                                        <span class="sub-item">@lang('create')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
