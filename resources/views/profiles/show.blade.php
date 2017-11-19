@extends('layouts.master')
@section('content')

	<!-- myads-page -->
	<section id="main" class="clearfix myads-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li>Ad Post</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">My Ads</h2>
			</div><!-- banner -->

			<div class="ad-profile section">	
					<div class="user-profile">
					
						<div class="user">
							<h2>Hello, <a href="my-ads.html#">{{Auth::user()->name}}</a></h2>
						
						</div>

						<div class="favorites-user">
							<div class="my-ads">
								<a href="my-ads.html">{{count($products)}}<small>My ADS</small></a>
							</div>
							
						</div>								
					</div><!-- user-profile -->
							
					<ul class="user-menu">
						<li><a href="my-profile.html">Profile</a></li>
						<li class="active"><a href="my-ads.html">My ads</a></li>

					</ul>
			
			</div><!-- ad-profile -->			
			
			<div class="ads-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="my-ads section">
							<h2>My ads</h2>
                            <!-- ad-item -->
                            @foreach($products as $product)
							<div class="ad-item row">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="details.html"><img src="{{url('public/'.$product->pictures[0]->url)}}" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div>
								
								<!-- rending-text -->
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">&#8358;{{number_format($product->price)}}</h3>
										<h4 class="item-title"><a href="my-ads.html#">{{$product->product_name}}</a></h4>
										<div class="item-cat">
											<span><a href="my-ads.html#">{{$product->category->category_name}}</a></span> 
										</div>										
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Posted On: <a href="my-ads.html#">{{ date('d F Y', strtotime($product->created_at)) }}</a></span>
											<span class="visitors">Views: {{$product->views}}</span> 
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="{{url('/edit_ad/'.$product->id)}}" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
											<a class="delete-item" href="{{url('/delete/'.$product->id)}}" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->
                           @endforeach
							
						</div>
					</div><!-- my-ads -->

					<!-- recommended-cta-->
					<div class="col-sm-4 text-center">
						<!-- recommended-cta -->
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
			</div><!-- row -->
		</div><!-- container -->
	</section><!-- myads-page -->
	
	
	@stop