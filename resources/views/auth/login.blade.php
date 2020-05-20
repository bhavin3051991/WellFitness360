@include('auth.template.header')
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
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
            <form id="login" method="POST">
                <input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
                <h1>Login</h1>
                <div class="auth-input">
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" required="" />
                </div>
                <div class="auth-input">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" />
                </div>
                <div class="auth-input">
                    {{-- <a class="btn btn-default submit" href="">Log in</a> --}}
                    <button type="submit" class="btn btn btn-success login-btn">Login</button>
                    <a class="reset_pass" href="javascript:void(0);">Forgot password?</a>
                    <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
                        <strong>Login With Facebook</strong>
                    </a>
                    <a href="{{ ROUTE('instagram.login') }}" class="btn btn-lg btn-primary btn-block">
                        <strong>Login With Instagram</strong>
                    </a>
                    <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
                        <strong>Login With Google</strong>
                    </a>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">New to site?
                    <a href="#signup" class="to_register"> Create Account </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                    <h1><i class="fa fa-paw"></i> WellFit360</h1>
                    <p>©2020 All Rights Reserved.</p>
                    </div>
                </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form id="registerForm" name="register" method="POST">
                <input type="hidden" name="_token" id="csrf-tokens" value="{{ csrf_token() }}">
                <h1>Create Account</h1>
                <div style="padding-bottom: 20px;">
                    <select class="form-control" name="roles">
                        <option>Register Type</option>
                        @if($roles)
                        @foreach($roles as $role)
                        <option value="{{ $role['id'] }}">{{ ucfirst($role['role_name']) }}</option>
                        @endforeach
                        @endif
                    </select>
                    <small class="text-danger">{{ $errors->first('roles') }}</small>
                </div>
                <div class="auth-input">
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="User Name" />
                </div>
                <div class="auth-input">
                    <small class="text-danger">{{ $errors->first('surname') }}</small>
                    <input type="text" name="surname" value="{{ old('surname') }}" class="form-control" placeholder="Surname" />
                </div>
                <div class="auth-input">
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" id="emailaddress"/>
                </div>
                <div class="auth-input">
                    <small class="text-danger">{{ $errors->first('contact_no') }}</small>
                    <input type="text" name="contact_no" value="{{ old('contact_no') }}" class="form-control" placeholder="Contact No" maxlength="10" />
                </div>
                <div class="auth-input">
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                    <input type="password" name="password" value="" class="form-control" placeholder="Password" />
                </div>
                <div>
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                <div id="gender" class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="gender" value="Male" data-parsley-multiple="gender" data-parsley-id="12"> &nbsp; Male &nbsp;
                    </label>
                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="gender" value="Female" data-parsley-multiple="gender"> Female
                    </label>
                    </div>
                </div>
                <div>
                    {{-- <a  href="index.html">Submit</a> --}}
                    <input type="submit" name="register" value="Submit" class="btn btn-success">
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">Already a member ?
                    <a href="#signin" class="to_register"> Log in </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                    <h1><i class="fa fa-paw"></i> WellFit360</h1>
                    <p>©2020 All Rights Reserved.</p>
                    </div>
                </div>
            </form>
          </section>
        </div>
      </div>
    </div>
@include('auth.template.footer')
