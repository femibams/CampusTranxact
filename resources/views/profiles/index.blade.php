
@extends('layouts.master')
@section('content')
	<!-- ad-profile-page -->
	<section id="main" class="clearfix  ad-profile-page">
		<div class="container">
		
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{url('/home')}}">Home</a></li>
					<li><a href="{{url('/Profile')}}">My Profile</a></li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">My Profile</h2>
			</div><!-- banner -->
			
			<div class="ad-profile section">	
				<div class="user-profile">
					<div class="user">
						<h2>Hello, <a href="/Profile">{{Auth::user()->name}}</a></h2>
						
					</div>

					<div class="favorites-user">
						<div class="my-ads">
							<a href="my-ads.html">{{count($products)}}<small>My ADS</small></a>
						</div>
						
						
					</div>								
				</div><!-- user-profile -->
						
				<ul class="user-menu">
					<li class="active"><a href="/Profile">Profile</a></li>
					<li><a href="/User_Ads">My ads</a></li>
				
				</ul>
			</div><!-- ad-profile -->	

			<div class="profile">
				<div class="row">
					<div class="col-sm-8" id="user_details">
						<div class="user-pro-section">
							<!-- profile-details -->
							<div class="profile-details section">
								<h2>Profile Details</h2>
								<!-- form -->
								<form class="form-horizontal" method="POST" action="{{url('/details_update')}}">
								@include('layouts.errors')		
                                    {{ csrf_field() }}
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">
								</div>

								<div class="form-group">
									<label>Email ID</label>
									<input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
								</div>

								<div class="form-group">
									<label for="name-three">Mobile</label>
									<input type="text" name="number" class="form-control"  value="{{Auth::user()->mobilenumber}}">
								</div>

								<div class="form-group">
									<label>Your Location</label>
									<select class="form-control" name="university_id">
									@foreach($universities as $university)
										@if($university->id == Auth::user()->university_id)  
										<option value="{{Auth::user()->university_id}}" selected>{{$university->NAME}}</option>
										@else
										<option value="{{$university->id}}">{{$university->NAME}}</option>
										@endif
									@endforeach
									</select>
								</div>	

								<!-- <div class="form-group">
									<label>You are a</label>
									<select class="form-control">
										<option value="#">{{Auth::user()->user_type}}</option>
										
									</select>
								</div>	 -->	
								
								<button type="submit" class="btn btn-primary">Update Profile</a>
							 </form>	
							</div><!-- profile-details -->
                       
							<!-- change-password -->
						<div class="change-password section">
								<h2>Change password</h2>
								<!-- form -->
							<form method="POST" action="{{url('/password_update')}}">
                                    {{ csrf_field() }}
									<div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                            <label for="old-password">Old Password</label>
                                <input id="oldpassword" type="password" class="form-control" name="oldpassword" >

                                @if ($errors->has('oldpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
						<div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
                            <label for="New-password">New Password</label>
                                <input id="newpassword" type="password" class="form-control" name="newpassword" >

                                @if ($errors->has('newpassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newpassword') }}</strong>
                                    </span>
                                @endif
                           
                        </div>
								
						<div class="form-group">
                            <label for="Password-Confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="confirmpassword">
                           
                        </div>		
								<button type="submit" class="btn btn-primary">Update Password</a>														
							 </div><!-- change-password -->
							 @include('layouts.errors')
							</form>	
						</div><!-- user-pro-edit -->
					</div><!-- profile -->
                     
					<div class="col-sm-4 text-center">
						<div class="recommended-cta">					
							<div class="cta">
								<!-- single-cta -->						
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-secure">
										<img src="{{asset('campustranxact/images/icon/13.png')}}" alt="Icon" class="img-responsive">
									</div><!-- cta-icon -->

									<h4>Secure Trading</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->

								<!-- single-cta -->
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-support">
										<img src="{{asset('campustranxact/images/icon/14.png')}}" alt="Icon" class="img-responsive">
									</div><!-- cta-icon -->

									<h4>24/7 Support</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->
							

								<!-- single-cta -->
								<div class="single-cta">
									<!-- cta-icon -->
									<div class="cta-icon icon-trading">
										<img src="{{asset('campustranxact/images/icon/15.png')}}" alt="Icon" class="img-responsive">
									</div><!-- cta-icon -->

									<h4>Easy Trading</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->

								<!-- single-cta -->
								<div class="single-cta">
									<h5>Need Help?</h5>
									<p><span>Give a call on</span><a href="tellto:08048100000"> 08048100000</a></p>
								</div><!-- single-cta -->
							</div>
						</div><!-- cta -->
					</div><!-- recommended-cta-->
				</div><!-- row -->	
			</div>				
		</div><!-- container -->
	</section><!-- ad-profile-page -->
	
	@stop