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
        .container-signup{
            padding: 20px 25px !important;
        }
        .error{
            margin: 0 !important;
        }
        .form-signup{
            padding: 10px;
        }
        .form-group{
            padding-top: 0;
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
        <form method="POST" id="registerForm" class="validation" onsubmit="return validRegCheck();" action="{{route('register')}}">
            @csrf
            <div class="container container-signup container-transparent animated fadeIn">
            <h3 class="text-center">@lang('signup')</h3>
            <div class="login-form">
                @error('email')
                <div class="custom-form">
                    <div class="form-group">
                        <div class="text-center">
                            <label class="error" for="email">@lang('email_use')</label>
                        </div>
                    </div>
                </div>
                @enderror
                <div class="custom-form">
                    <div class="form-group pb-0">
                        <label for="name" class="placeholder"><b>@lang('name')</b></label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>
                    <label class="error-part m-0 pl-3"></label>
                </div>
                <div class="custom-form">
                    <div class="form-group pb-0">
                        <label for="email" class="placeholder"><b>@lang('email')</b></label>
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                    <label class="error-part m-0 pl-3"></label>
                </div>
                <div class="custom-form">
                    <div class="form-group pb-0">
                        <label for="country" class="placeholder"><b>@lang('country')</b></label>
                        <select id="country" name="country" class="form-control">
                            <option value="br">@lang('brazil')</option>
                            <option value="ar">@lang('argentina')</option>
                        </select>
                    </div>
                    <label class="error-part m-0 pl-3"></label>
                </div>
                <div class="form-group pb-0">
                    <label for="password_register" class="placeholder"><b>@lang('password')</b></label>
                    <div class="position-relative">
                        <input id="password_register" name="password_register" type="password" minlength="6" class="form-control" required>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    <label class="error-part m-0 pl-2"></label>
                </div>
                <div class="form-group pb-0">
                    <label for="password_confirmation" class="placeholder"><b>@lang('confirm_password')</b></label>
                    <div class="position-relative">
                        <input id="password_confirmation" name="password_confirmation" type="password" minlength="6" class="form-control" required>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    <label class="error-part m-0 pl-2"></label>
                </div>
                <div class="row form-signup">
                    <div class="col-md-6 offset-md-6">
                        <button type="submit" class="btn btn-secondary w-100 fw-bold">@lang('signup')</button>
                    </div>
                </div>
                <div class="login-account">
                    <span class="msg">@lang('already_have_account') ?</span>
                    <a href="{{url('/login')}}" class="link">@lang('signin')</a>
                </div>
            </div>
            <input type="hidden" name="type" value="{{$type}}">
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
<script>
    $(() => {
        $('.container-signup').show();
    });
</script>
</body>
</html>
