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
                        <h2>@lang('backend/list.forms.edit_trainer')</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="javascript:void(0);">Settings 1</a>
                                    </li>
                                    <li><a href="javascript:void(0);">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="trainerForm" action="{{ route('trainerManagement.update',$trainer['id']) }}"  method="post" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                             {{ method_field('PUT') }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="{{ $trainer['name'] }}" id="name" class="form-control col-md-7 col-xs-12" placeholder="Enter Name">
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Sur Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="surname" name="surname" value="{{ $trainer['sur_name'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter surname">
                                    <small class="text-danger">{{ $errors->first('surname') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="email" value="{{ $trainer['email'] }}" id="email" class="form-control col-md-7 col-xs-12" placeholder="Enter email address" disabled="disabled">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_no" class="control-label col-md-3 col-sm-3 col-xs-12">Contact NO</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="contact_no" value="{{ $trainer['contact_no'] }}" id="contact_no" maxlength="10" class="form-control col-md-7 col-xs-12" placeholder="Enter contact number">
                                    <small class="text-danger">{{ $errors->first('contact_no') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="1" data-parsley-multiple="gender" @if($trainer['gender'] == 1) checked @endif> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="gender" value="2" data-parsley-multiple="gender" @if($trainer['gender'] == 2) checked @endif> Female
                                        </label>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('gender') }}</small>
                                </div>
                                <div class="Gendererror"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="status" name="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="0" @if($trainer['status'] == 0) selected @endif>Pending</option>
                                        <option value="1" @if($trainer['status'] == 1) selected @endif>Active</option>
                                        <option value="2" @if($trainer['status'] == 2) selected @endif>InActive</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
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