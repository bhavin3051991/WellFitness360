@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')
<!-- /top navigation -->

<!-- banner section -->
<div class="wf-banner-sec">
	<div class="container-fluid">
		<div class="row">
			<div class="banner-image">
				<img src="{{ asset('frontend/images/banner.jpg') }}" alt="image" class="banner-img">
			</div>
			<div class="banner-detail">
				<a href="javascript:void(0);"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
				<p class="p3">UNLEASH YOUR POWER</p>
				<p class="p2">Video Based Workouts Everywhere-Anywhere</p>
				<a href="javascript:void(0);" class="blue-btn btn">Lets Get Started</a>
			</div>
		</div>
	</div>	
</div>
<!-- End of banner section -->
<!-- get access section-->
<div class="wf-get-access space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center get-section">
				<h2>Get access to hundreds of pre recorded workouts</h2>
				<p class="p1">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod </p>
				<a href="javascript:void(0);" class="blue-btn btn">Sign Up</a>
			</div>
		</div>
	</div>
</div>
<!-- End of get access -->
<!-- take programs section -->
<div class="wf-take-pro-sec">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="left-sec-img">
					<img src="{{ asset('frontend/images/image700.jpg') }}" class="img">
				</div>
			</div>
			<div class="col-md-6 right-take-sec">
				<div class="right-take-detail">
					<h2>Take programs tailored to your fitness level</h2>
					<p class="p1">Take a workout of 10, 30 or 60 minutes anywhere you are when you want.</p>
					<a href="javascript:void(0);" class="blue-btnwithout-redius btn">Start The Workout</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of the take program section -->
<!-- fitness level sec-->
<div class="wf-fitness-level-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 left-fitness-sec">
				<div class="left-take-detail">
					<h2>Take programs tailored to your fitness level</h2>
					<p class="p1">Take a workout of 10, 30 or 60 minutes anywhere you are when you want.</p>
					<a href="javascript:void(0);" class="blue-btnwithout-redius btn">Start The Workout</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="left-sec-img">
					<img src="{{ asset('frontend/images/mobile1.png') }}" class="img">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of fitness level sec -->
<!-- take programs 2 section -->
<div class="wf-take-pro-sec wf-take-pro-sec2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 right-take-sec">
				<div class="right-take-detail">
					<h2>Take programs tailored to your fitness level</h2>
					<p class="p1">Take a workout of 10, 30 or 60 minutes anywhere you are when you want.</p>
					<a href="javascript:void(0);" class="blue-btnwithout-redius btn">Start The Workout</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="left-sec-img">
					<img src="{{ asset('frontend/images/image700.jpg') }}" class="img">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end of the take program 2 section -->
<!-- get access section-->
<div class="wf-get-access give-new-way-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center get-section">
				<h2>We give a new way to wellness so be well be wellfit together</h2>
				<p class="p1">Get the benefits of being fit check out our app here. </p>
				<div class="social-icon">
					<img src="{{ asset('frontend/images/apple-store.png') }}" class="apple">
					<img src="{{ asset('frontend/images/googleapp.png') }}" class="googleapp">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of get access -->
<!-- start now section -->
<div class="wf-start-now-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center start-form">
				<h2>Start Now!</h2>
				<p>Unleash your Power</p>
				<form class="needs-validation" name="login-Form" id="login-Form" method="post">
					<input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
					<div class="form-group">
						<input type="text" class="form-control" id="email" placeholder="Email" name="email">
						<!-- <div class="invalid-feedback">Please fill out this field.</div -->
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						<!-- <div class="invalid-feedback">Please fill out this field.</div> -->
					</div>
					<input type="submit" class="blue-btnwithout-redius btn" id="submit" name="submit" value="Start The Workout">
					<!-- <a href="javascript:void(0);" class="blue-btnwithout-redius btn">Start The Workout</a> -->
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End of the start now section -->

<!-- Footer -->
@include('Frontend.layouts.footer')
<!-- /Footer -->

@endsection
