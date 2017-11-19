@extends('layouts.master')

@section('content')

	<!-- signin-page -->
	<section id="main" class="clearfix user-page">
		<div class="container">
			<div class="row text-center">
				<!-- user-login -->
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="user-account">
						<h2>Login</h2>
						<!-- form -->
						<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                         {{ csrf_field() }}
							  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="username" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

							
							  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
						</form><!-- form -->

                      <!-- forgot-password -->
						<div class="user-option">
							<div class="checkbox pull-left">
								<label>
                                 <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                 </label>
							</div>
							<div class="pull-right forgot-password">
								  <a class="" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
							</div>
						</div><!-- forgot-password -->
						
	</section><!-- signin-page -->

	

	
  </body>
</html>

@endsection
