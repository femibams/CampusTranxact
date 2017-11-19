@extends('layouts.master')
@section('content')

	<!-- main -->
	<section id="main" class="clearfix details-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{url('/home')}}">Home</a></li>
				</ol><!-- breadcrumb -->

			</div>

				<!-- banner-form -->
				<div class="banner-form">
				<form class="form-horizontal" method="GET" action="{{url('/product_search')}}" >
									{{ csrf_field() }}

								<!-- category-change -->
                    <select class="form-control category-dropdown dropdown" name="category">
					   <option value="all">All Categories</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
					</select>

								<!-- category-change -->
								<input type="text" class="form-control" name"product_name" placeholder="What Are You Looking For ?">
								<button type="submit" class="form-control" value="Search">Search</button>
							</form>
			   </div><!-- banner-form -->


			<div class="section slider">
				<div class="row">
					<!-- carousel -->
					<div class="col-md-7">
						<div id="product-carousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->

							<ol class="carousel-indicators"id="carousel-indicators">
							  @foreach($product->pictures as $image)
								<li data-target="#product-carousel" data-slide-to="0" class="active">
								<img src="{{url('public/'.$image->url)}}" alt="Carousel Thumb"height="" width="40%" class="img-responsive">
								</li>
								@endforeach
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<!-- item -->
								@for($i=0; $i<count($product->pictures); $i++)
                                @if($i == 0)
								<div class="item active">
									<div class="carousel-image">
										<!-- image-wrapper -->
										<img src="{{url('public/'.$product->pictures[0]->url)}}" height="" width="100%" alt="Featured Image" class="img-responsive">
									</div>
								</div><!-- item -->
								@else
								<!-- item -->
								<div class="item">
									<div class="carousel-image">
										<!-- image-wrapper -->
										<img src="{{url('public/'.$product->pictures[$i]->url)}}"  height="" width="100%" alt="Featured Image" class="img-responsive">
									</div>
								</div><!-- item -->
								@endif
                                @endfor
							</div><!-- carousel-inner -->

							<!-- Controls -->
							<a class="left carousel-control" href="details.html#product-carousel" role="button" data-slide="prev">
								<i class="fa fa-chevron-left"></i>
							</a>
							<a class="right carousel-control" href="details.html#product-carousel" role="button" data-slide="next">
								<i class="fa fa-chevron-right"></i>
							</a><!-- Controls -->
						</div>
					</div><!-- Controls -->

					<!-- slider-text -->
					<div class="col-md-5">
						<div class="slider-text">
							<h2>&#8358;{{number_format($product->price)}}</h2>
							<h3 class="title">{{$product->product_name}}</h3>
							<p><span>Offered by: <a href="details.html#">{{$product->user->name}}</a></span>
							<span class="icon"><i class="fa fa-clock-o"></i><a href="#">{{ date('d F Y', strtotime($product->created_at)) }}</a></span>
							<span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{$product->user->university->NAME}}</a></span>
							<span class="icon"><i class="fa fa-suitcase online"></i><a href="#">{{$product->user->user_type}} </a></span>

							<!-- short-info -->

							<!-- contact-with -->
							<div class="contact-with">
								<h4>Contact with </h4>
								<span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									<span class="hide-text" onclick="myFunction()">Click to show phone number </span>
									<span class="hide-number" id="num">{{$product->user->mobilenumber}}</span>
								</span>
								<script>
										function myFunction(){
											var x= document.getElementById("num");
											if(x.style.display ==="none"){
												x.style.display="block";
											}else{
												x.style.display="none";
											}
										}
								</script>

								<a href="mailto:{{$product->user->email}}" class="btn"><i class="fa fa-envelope-square"></i>Reply by email</a>

							</div><!-- contact-with -->


						</div>
					</div><!-- slider-text -->
				</div>
			</div><!-- slider -->

			<div class="description-info">
				<div class="row">
					<!-- description -->
					<div class="col-md-8">
						<div class="description">
							<h4>Description</h4>
							<p>{{$product->product_description}}</p>
						</div>
					</div><!-- description -->

					<!-- description-short-info -->
					<div class="col-md-4">
						<div class="short-info">
							<h4>Short Info</h4>
							<!-- social-icon -->
							<ul>
								<li><i class="fa fa-shopping-cart"></i><a href="#">Delivery: Meet in person</a></li>
								<li><i class="fa fa-user-plus"></i><a href="#">More ads by <span>Yury Corporation</span></a></li>
								<li><i class="fa fa-exclamation-triangle"></i><a href="#">Report this ad</a></li>
							</ul><!-- social-icon -->
						</div>
					</div>
				</div><!-- row -->
			</div><!-- description-info -->

			<div class="recommended-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="section recommended-ads">
							<div class="featured-top">
								<h4>Recommended Ads for You</h4>
							</div>
							<!-- ad-item -->
							@foreach($related_products as $related_product)
							<div class="ad-item row">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="details.html"><img src="{{url('public/'.$related_product->pictures[0]->url)}}" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div>

								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">&#8358;{{number_format($related_product->price)}}</h3>
										<h4 class="item-title"><a href="{{url('/ProductShow/'.$product->id)}}">{{$product->product_name}}</a></h4>
										<div class="item-cat">
											<span><a href="#">{{$product->category->category_name}}</a></span>

										</div>
									</div><!-- ad-info -->

									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated"><a href="details.html#">{{ date('d F Y', strtotime($product->created_at)) }}</a></span>
											<a href="details.html#" class="tag"><i class="fa fa-tags"></i>{{$product->status_id}}</a>
										</div>
										<!-- item-info-right -->
										<div class="user-option pull-right">
										@if($product->user->user_type =="student")
										  <a href="#" data-toggle="tooltip" data-placement="top" title="{{$product->user->university->NAME}}"><i class="fa fa-map-marker"></i> </a>
										  @else
										  <a href="#" data-toggle="tooltip" data-placement="top" title="{{$product->user->name}}"><i class="fa fa-map-marker"></i> </a>
                                         @endif
										<a class="online" href="details.html#" data-toggle="tooltip" data-placement="top" title="{{$product->user->user_type}}"><i class="fa fa-user"></i> </a>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->

							</div><!-- ad-item -->
							@endforeach

						</div>
					</div><!-- recommended-ads -->

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
									<div class="cta-icon icon-trading" >
										<img src="{{asset('campustranxact/images/icon/15.png')}}" alt="Icon" class="img-responsive">
									</div><!-- cta-icon -->

									<h4>Easy Trading</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
								</div><!-- single-cta -->

								<!-- single-cta -->
								<div class="single-cta">
									<h5>Need Help?</h5>
									<p><span>Give a call on</span><a href="tellto:08166870575"> 08166870575</a></p>
								</div><!-- single-cta -->
							</div>
						</div><!-- cta -->
					</div><!-- recommended-cta-->
				</div><!-- row -->
			</div><!-- recommended-info -->
		</div><!-- container -->
	</section><!-- main -->

	<!-- download -->
	<section id="something-sell" class="clearfix parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2 class="title">Do you have something-sell?</h2>
					<h4>Post your ad for free on campustranxact.com</h4>
					<a href="{{url('/ProductForm')}}" class="btn btn-primary">Post Your Ad</a>
				</div>
			</div><!-- row -->
		</div><!-- contaioner -->
	</section><!-- download -->

	@stop
