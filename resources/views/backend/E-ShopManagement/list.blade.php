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
          <div class="page-title">
            <div class="title_left">
                <h3>@lang('backend/list.forms.e_shop_management')</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="{{ route('E_shopManagement.create') }}"<button type="button" class="btn btn-success add-new-btn">@lang('backend/list.forms.add_new')</button></a>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
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
                <div class="x_title">
                  <h2>@lang('backend/list.forms.list')</h2>
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
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#SR.NO</th>
                        <th>Name</th>
                        <th>Shop URL</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($ShopList)
                        @php
                            $srNo = 1;
                        @endphp
                        @foreach($ShopList as $shop)
                        <tr>
                            <td>{{ $srNo }}</td>
                            <td>{{ $shop['Name'] }}</td>
                            <td>
                                <a href="{{ $shop['Shop_URL'] }}" target="_blank">
                                    {{ $shop['Shop_URL'] }}
                                </a>
                            </td>
                            <td><img src="{{ asset($shop['Image']) }}" style="height: 70px;"></td>
                            <td>
                              @if($shop['Status'] == 1)
                                <span class="label label-success">Active</span>
                              @else
                                <span class="label label-danger">InActive</span>
                              @endif
                            </td>
                            <td>
                                <a href="{{ route('E_shopManagement.edit',$shop['ID']) }}"><i class="fa fa-edit"></i> Edit</a>
                                <a href="javascript:void(0);" data-id="{{ $shop['ID'] }}" class="deleteShop">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @php $srNo++ @endphp
                        @endforeach
                        @endif
                    </tbody>
                  </table>
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
