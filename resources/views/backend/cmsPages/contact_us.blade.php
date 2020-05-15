@extends('backend.layouts.app')

@section('content')

<div class="main_container">
    @include('backend.templates.sidebar')

    <!-- top navigation -->
    @include('backend.templates.header')
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>@lang('backend/list.forms.contact_us_content')</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  @if(session()->has('success_msg'))
                  <div class="alert alert-success">
                    {{ session()->get('success_msg') }}
                  </div>
                  @endif

                  @if(session()->has('error_msg'))
                  <div class="alert alert-danger">
                    {{ session()->get('error_msg') }}
                  </div>
                  @endif
                </div>
                <div class="x_content">
                  <br />
                  <form id="contactUsForm" action="{{ route('cms_contactus') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.email')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="email" name="email" value="@if(isset($contact_us->email) && !empty($contact_us->email)){{$contact_us->email}}@endif" class="form-control has-feedback-left" placeholder="Email">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.contact_no')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" name="contact_number" value="@if(isset($contact_us->contact_number) && !empty($contact_us->contact_number)){{$contact_us->contact_number}}@endif" maxlength="10" class="form-control" placeholder="Enter contact number">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            <small class="text-danger">{{ $errors->first('contact_no') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">@lang('backend/list.forms.telephone_no')</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input type="text" name="telephone" value="@if(isset($contact_us->telephone) && !empty($contact_us->telephone)){{$contact_us->telephone}}@endif"  class="form-control" data-inputmask="'mask' : '(999) 999-9999'">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            <small class="text-danger">{{ $errors->first('telephone') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.website')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="website" value="@if(isset($contact_us->website) && !empty($contact_us->website)){{$contact_us->website}}@endif" id="title" class="form-control col-md-7 col-xs-12" placeholder="Enter title">
                            <small class="text-danger">{{ $errors->first('website') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.address')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="address" class="form-control" rows="3" placeholder="Enter address">@if(isset($contact_us->address) && !empty($contact_us->address)){{$contact_us->address}} @endif</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.description')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="description" class="resizable_textarea form-control" placeholder="Enter description">@if(isset($contact_us->description) && !empty($contact_us->description)) {{ $contact_us->description }} @endif</textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button" onclick="window.history.go(-1); return false;">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('backend.templates.footer')
    <!-- /footer content -->
  </div>

@endsection
