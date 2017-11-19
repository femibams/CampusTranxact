@extends('layouts.master')
@section('content')
	<!-- home-one-info -->
	<section id="home-one-info" class="clearfix home-one">
		<!-- world -->
		<div id="banner-two" class="parallax-section">
			<div class="row text-center">
				<!-- banner -->
				<div class="col-sm-12 ">
					<div class="banner">
						<h1 class="title"><span style="color:#ca351b">Campus</span><span style="color:#3a3012 !important">Tranxact</span></h1>
            <p>Student Online Store</p>
						<h3>Search Different Nigerian Universities & Post Your Ads!</h3>
						<!-- banner-form -->
						<div class="banner-form">
						<form class="form-horizontal" method="GET" action="{{url('/product_search')}}">
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

						<!-- banner-socail -->
						<ul class="banner-socail">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						</ul><!-- banner-socail -->
					</div>
				</div><!-- banner -->
			</div><!-- row -->
		</div><!-- world -->

		   <div class="container">
			   <div id="category"></div>
		       <div class="section category-ad text-center">
				<ul class="category-list">
					<li class="category-item">
						<a href="{{url('/Category/1')}}">
							<div class="category-icon"><img src="{{asset('campustranxact/images/icon/mobile1.png')}}" alt="images" class="img-responsive"></div>
							<span class="category-title">Mobile</span>
							
						</a>
					</li><!-- category-item -->

					<li class="category-item">
						<a href="{{url('/Category/2')}}">
							<div class="category-icon"><img src="{{asset('campustranxact/images/icon/2.png')}}" alt="images" class="img-responsive"></div>
							<span class="category-title">Electrics & Gedgets</span>
						
						</a>
					</li><!-- category-item -->

					<li class="category-item">
						<a href="{{url('/Category/3')}}">
							<div class="category-icon"><img src="{{asset('campustranxact/images/icon/5.png')}}" alt="images" class="img-responsive"></div>
							<span class="category-title">Fshion & Beauty</span>
							
						</a>
					</li><!-- category-item -->

					<li class="category-item">
						<a href="{{url('/Category/4')}}">
							<div class="category-icon"><img src="{{asset('campustranxact/images/icon/11.png')}}" alt="images" class="img-responsive"></div>
							<span class="category-title">Music Instruments & Art</span>
							
						</a>
					</li><!-- category-item -->

					<li class="category-item">
						<a href="{{url('/Category/6')}}">
							<div class="category-icon"><img src="{{url('campustranxact/images/icon/8.png')}}" alt="images" class="img-responsive"></div>
							<span class="category-title">Books & Magazines</span>
							
						</a>
					</li><!-- category-item -->
					<li class="category-item">
						<a href="{{url('/Category/5')}}">
							<div class="category-icon"><img src="{{url('campustranxact/images/icon/handshake.png')}}" alt="images" class="img-responsive"></div>
							<span class="category-title">Swap Zone</span>
							
						</a>
					</li><!-- category-item -->
					
				</ul>
			</div><!-- category-ad -->


      			<!-- featureds -->
      			<div class="section featureds">
      				<div class="row">
      					<!-- featured-top -->
      					<div class="col-sm-12">
      						<div class="featured-top">
      							<h4>Featured Ads</h4>
      						</div>
      					</div><!-- featured-top -->
      				</div>

      				<div class="row">
					  <div id="ads"></div>
					  @foreach($products as $product)
      					<!-- featured -->
      					<div class="col-md-4 col-lg-3">
      						<!-- featured -->
      						<div class="featured">
      							<div class="featured-image">
      								<a href="{{('/ProductShow/'.$product->id)}}"><img src="{{url('public/'.$product->pictures[0]->url)}}" alt="image here" height="200" widht="100" class="img-respocive"></a>
      								<a href="#" class="verified" data-toggle="tooltip" data-placement="top" title="Verified"><i class="fa fa-check-square-o"></i></a>
      							</div>

      							<!-- ad-info -->
      							<div class="ad-info">
      								<h3 class="item-price">&#8358;{{number_format($product->price)}}</h3>
      								<h4 class="item-title"><a href="{{('/ProductShow/'.$product->id)}}">{{$product->product_name}}</a></h4>
      								<div class="item-cat">
      									<span><a href="{{('/ProductShow/'.$product->id)}}">{{$product->category->category_name}}</a></span>
      								</div>
      							</div><!-- ad-info -->

      							<!-- ad-meta -->
      							<div class="ad-meta">
      								<div class="meta-content">
										  <span class="dated"><a href="#">{{ date('d F Y', strtotime($product->created_at)) }} </a></span>
										   @if($product->user->user_type =="student")
										  <a href="#" data-toggle="tooltip" data-placement="top" title="{{$product->user->university->NAME}}"><i class="fa fa-map-marker"></i> </a>
										  @else
										  <a href="#" data-toggle="tooltip" data-placement="top" title="{{$product->user->name}}"><i class="fa fa-map-marker"></i> </a>
                                         @endif
      									<a href="#" data-toggle="tooltip" data-placement="top" title="{{$product->user->user_type}}"><i class="fa fa-suitcase"></i> </a>
      								</div>
      								<!-- item-info-right -->
      								<div class="user-option pull-right">
      									
      								</div><!-- item-info-right -->
      							</div><!-- ad-meta -->
      						</div><!-- featured -->
      					</div><!-- featured -->
					  @endforeach
      					
					  </div><!-- row -->
					  <!--pagination -->
					  {{$products->links()}} 
					  <!-- pagination  -->
      			</div><!-- featureds -->


      			<!-- cta -->
      			<div class="section cta text-center">
      				<div class="row">
      					<!-- single-cta -->
      					<div class="col-sm-4">
      						<div class="single-cta">
      							<!-- cta-icon -->
      							<div class="cta-icon icon-secure">
      								<img src="{{asset('campustranxact/images/icon/13.png')}}" alt="Icon" class="img-responsive">
      							</div><!-- cta-icon -->
                    <h4>Secure Trading</h4>
                    <button class="btn" onclick="reveal_secure()">Learn More</button>
                    <div id="onclick-btn">
                      <br>
                      <p style="font-weight: bold">Get your money back</p>
                      <p style="text-align:center">Coming soon!!! You can get your money back after you have paid through our online platform for a good, if you detect fault within 5 days....
                      it is advised that you check the good you are buying before checking good to payment</p>
                    </div>
      						</div>
      					</div><!-- single-cta -->

      					<!-- single-cta -->
      					<div class="col-sm-4">
      						<div class="single-cta">
      							<!-- cta-icon -->
      							<div class="cta-icon icon-support">
      								<img src="{{asset('campustranxact/images/icon/14.png')}}" alt="Icon" class="img-responsive">
      							</div><!-- cta-icon -->

      							<h4>24/7 Support</h4>
                    <button class="btn" onclick="reveal_contact()">Contact Us</button>
                    <div id="onclick-btn2">
                      <br>
                      <p style="font-weight: bold">Customer Care</p>
                      <p style="text-align:center">Have you checked the <a href="#">FAQ</a> page and you didn't find your answer ? No worries, we are here to <a href="#">assist</a></p>
                    </div>
      						</div>
      					</div><!-- single-cta -->

      					<!-- single-cta -->
      					<div class="col-sm-4">
      						<div class="single-cta">
      							<!-- cta-icon -->
      							<div class="cta-icon icon-trading">
      								<img src="{{asset('campustranxact/images/icon/15.png')}}" alt="Icon" class="img-responsive">
      							</div><!-- cta-icon -->

      							<h4>Easy Trading</h4>
                    <button class="btn" onclick="reveal_easy()">Learn More</button>
                    <div id="onclick-btn3">
                      <br>
                      <p style="font-weight: bold">Connect Faster</p>
                      <p style="text-align:center">Trading from school has never been easy <br><a href="#">Learn More</a></p>
                    </div>
      						</div>
      					</div><!-- single-cta -->
      				</div>
      			</div><!-- cta -->

      		</div><!-- container -->
      	</section><!-- world-gmap -->

   @endsection
        </body>
      </html>
