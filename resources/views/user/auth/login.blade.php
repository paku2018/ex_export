<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts and icons -->
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- Global stylesheets -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/atlantis.min.css') }}" rel="stylesheet">
    <style>
        .error{
            margin: 0 !important;
        }
    </style>
</head>
<body class="login">
<div class="wrapper wrapper-login wrapper-login-full p-0">
    <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
        <h1 class="title fw-bold text-white mb-3">@lang('join_our_service')</h1>
        <p class="subtitle text-white op-7">@lang('goldfy_title')</p>
    </div>
    <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
        <form method="POST" id="loginForm" class="validation" action="{{route('login')}}" onsubmit="return validLogCheck();" action="{{route('login')}}">
            @csrf
            <div class="container container-login container-transparent animated fadeIn">
            <h3 class="text-center">@lang('signin')</h3>
            <div class="login-form">
                @error('email')
                <div class="custom-form">
                    <div class="form-group">
                        <div class="error-form text-center p-2">
                            <label class="error" for="username">@lang('invalid_email_pass')</label>
                        </div>
                    </div>
                </div>
                @enderror
                <div class="custom-form">
                    <div class="form-group pb-0">
                        <label for="email" class="placeholder"><b>@lang('email')</b></label>
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                    <label class="error-part m-0 pl-3"></label>
                </div>
                <div class="form-group pb-0">
                    <label for="password" class="placeholder"><b>@lang('password')</b></label>
                    <a href="#" class="link float-right">@lang('forget_password') ?</a>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control" required>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    <label class="error-part m-0 pl-2"></label>
                </div>
                <div class="form-group form-action-d-flex mb-3" style="justify-content: flex-end !important;">
                    <button type="submit" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">@lang('signin')</button>
                </div>
                <div class="login-account d-flex flex-column">
                    <span class="msg">@lang('no_account') ?</span>
                    <span>@lang('signup')<a href="{{route('user.auth.register','seller')}}" class="ml-2 ml-md-4 link">@lang('seller')</a><a href="{{route('user.auth.register','transporter')}}" class="link ml-2 ml-md-4">@lang('transporter')</a></span>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
<script src="{{asset('assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>

<script src="{{asset('user/js/auth.js')}}"></script>
</body>
</html>
