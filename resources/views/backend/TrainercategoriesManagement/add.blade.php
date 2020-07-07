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
                        <h2>Add Trainer Categories</h2>
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
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="categoryForm" action="{{ route('trainercategoriesManagement.store') }}" method="post" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Parent Categories</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="status" name="categoryList" class="form-control valid" aria-invalid="false">
                                        <option value="">Select category name</option>
                                        <option value="0">None</option>
                                        {{!!$categoryList!!}}
                                    </select>
                                    <small class="text-danger"></small>
                                    <small class="text-danger">{{ $errors->first('categoryList') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Categories Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="trainer_cat_name" value="{{ old('trainer_cat_name') }}" id="trainer_cat_name" class="form-control col-md-7 col-xs-12" placeholder="Please enter trainer categories name">
                                    <small class="text-danger">{{ $errors->first('trainer_cat_name') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Parent Categories</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="status" name="status" class="form-control valid" aria-invalid="false">
                                        <option value="">Select status</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                    <small class="text-danger"></small>
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