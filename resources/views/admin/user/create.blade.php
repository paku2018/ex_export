@extends('user.layouts.base')

@section('page-css')

@endsection

@section('content')
    <div class="container">
        <div class="page-inner order-page profile-page">
            <div class="page-header">
                <h4 class="page-title">{{isset($data)?__('edit_user'):__('create_user')}}</h4>
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
                        <a href="#">User</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{isset($data)?__('edit'):__('create')}}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <div class="card-title">@lang('information')</div>
                        </div>
                        <form id="userForm" method="post" action="{{route('admin.user.update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{isset($data)?$data->id:0}}">
                            <div class="card-body">
                                @if(session()->has('email_error'))
                                    <div class="custom-error">
                                        <h5 class="text-center mb-0">@lang('email_use') @lang('use_another')</h5>
                                    </div>
                                @endif
                                @if(session()->has('server_error'))
                                    <div class="custom-error">
                                        <h5 class="text-center mb-0">@lang('server_error') @lang('try_again')</h5>
                                    </div>
                                @endif
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">@lang('name') <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="name-addon">@</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name" value="{{isset($data)?$data->name:''}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">@lang('email') <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email" value="{{isset($data)?$data->email:''}}" placeholder="Enter Email" {{isset($data)?'disabled':''}}>
                                    </div>
                                </div>
                                @if(!isset($data))
                                <div class="form-group form-show-validation row new-password">
                                    <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">@lang('password') <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="confirmpassword" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">@lang('confirm_password') <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                                @endif
                                <div class="separator-solid"></div>
                                <div class="form-group form-show-validation row">
                                    <label for="country_code" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">@lang('country') <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <select name="country_code" id="country_code" class="form-control" required>
                                            <option value="br" {{isset($data)&&$data->country_code=="br"?"selected":""}}>@lang('brazil')</option>
                                            <option value="ar" {{isset($data)&&$data->country_code=="ar"?"selected":""}}>@lang('argentina')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="role" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">@lang('role') <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="seller" {{isset($data)&&$data->role=="seller"?"selected":""}}>@lang('seller')</option>
                                            <option value="transporter" {{isset($data)&&$data->role=="transporter"?"selected":""}}>@lang('transporter')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">@lang('avatar') <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-file input-file-image">
                                            <img class="img-upload-preview img-circle" id="img-avatar" width="100" height="100" src="{{isset($data)&&isset($data->avatar)?$user->avatar:asset('assets/img/profile.jpg')}}" alt="preview" onerror="src='{{asset('assets/img/profile.jpg')}}'">
                                            <input type="file" class="form-control form-control-file" id="avatar" name="avatar" accept="image/*">
                                            <label for="avatar" class="btn btn-primary btn-round btn-lg"><i class="fa fa-file-image"></i> @lang('upload_image')</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-custom" type="submit">@lang('save')</button>
                                        <button class="btn btn-custom-error">@lang('cancel')</button>
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
    <!-- JQuery Datepicker JS -->
    <script src="{{asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- JQuery validate JS -->
    <script src="{{asset('assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>
    <script>
        $('#birth').datetimepicker({
            format: 'MM/DD/YYYY'
        });

        // validation when inputfile change
        $("#avatar").on("change", function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
            $(this).parent('form').validate();
        })

        $("#userForm").validate({
            validClass: "success",
            rules: {
                name:{
                    required: true
                },
                email:{
                    required:true,
                    email:true
                },
                password:{
                    required:true
                },
                confirmpassword: {
                    equalTo: "#password"
                },
                country_code: {
                    required: true
                },
                role: {
                    required: true
                }
            },
            messages: {
                name:{
                    required: '@lang('field_required')',
                },
                email: {
                    required: '@lang('field_required')',
                    email:'@lang('not_email')'
                },
                password: {
                    required: '@lang('field_required')'
                },
                confirmpassword: {
                    equalTo: '@lang('password_not_equal')'
                },
                country_code:{
                    required: '@lang('field_required')'
                },
                role: {
                    required: '@lang('field_required')'
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $('.new-password').addClass('has-success');
            },
        });
    </script>
@endsection
