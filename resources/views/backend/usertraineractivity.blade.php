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
					<h3>@lang('backend/list.user_trainer_activity')</h3>
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
							<h2>@lang('backend/list.list')</h2>
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
						<input type="hidden" name="_token" value="{{ csrf_token() }}" id="csrf-tokens">
						<div class="x_content">
							<table id="datatable-buttons" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Type</th>
										<th>Select User Or Trainer</th>
									</tr>
								</thead>
								<tbody>
									@php 
										$checkedusertrainer = isset($usertrainer['user_id']) ? json_decode($usertrainer['user_id']) : [];
									@endphp
									@if($users)
										@foreach($users as $user)
										<tr>
											<td>{{ ucfirst($user['name']) }} {{ ucfirst($user['sur_name']) }}</td>
											<td>{{ $user['email'] }}</td>
											@if($user['role_id'] == 2)
												<td>User</td>
											@else
												<td>Trainer</td>	
											@endif
											<td><input type="checkbox" class="selectusertrainer-cls" name="selectuserandtrainer[]" id="selectuserandtrainer" value="{{ $user['id'] }}" @if(!empty($checkedusertrainer) && in_array($user['id'], $checkedusertrainer)) checked @endif></td>
										</tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-success usertrainer-cls">Submit</button>
							</div>
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