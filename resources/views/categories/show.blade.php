@extends('layouts.master')
@section('content')


	<!-- services-ad -->
	<section id="services-ad" class="clearfix home-three">

		<div class="container">
			<div class="row">
				<!-- banner -->
				<div class="col-sm-12">
					<div class="banner">
					</div>
				</div><!-- banner -->
			</div><!-- row -->

			<div class="section services">
				<!-- single-service -->
				<div class="single-service">
        <a href="{{url('/Category/1')}}">
					<div class="services-icon"><img src="{{asset('campustranxact/images/icon/mobile1.png')}}" alt="images" class="img-responsive"></div>
          <h5>Mobile</h5>
          </a>
				</div><!-- single-service -->

				<!-- single-service -->
				<div class="single-service">
        <a href="{{url('/Category/2')}}">
					<div class="services-icon"><img src="{{asset('campustranxact/images/icon/2.png')}}" alt="images" class="img-responsive"></div>
					<h5>Electronics & Gedgets</h5>
        </a>
				</div><!-- single-service -->

				<!-- single-service -->
				<div class="single-service">
        <a href="{{url('/Category/3')}}">
					<div class="services-icon"><img src="{{asset('campustranxact/images/icon/5.png')}}" alt="images" class="img-responsive"></div>
          <h5>Fashion & Beauty</h5>
        </a>   
				</div><!-- single-service -->

				<!-- single-service -->
				<div class="single-service">
        <a href="{{url('/Category/4')}}">
					<div class="services-icon"><img src="{{asset('campustranxact/images/icon/8.png')}}" alt="images" class="img-responsive"></div>
					<h5>Music Instruments & Arts</h5>
        </a>
				</div><!-- single-service -->

				<!-- single-service -->
				<div class="single-service">
        <a href="{{url('/Category/6')}}">
					<div class="services-icon"><img src="{{asset('campustranxact/images/icon/8.png')}}" alt="images" class="img-responsive"></div>
          <h5>Books & Magazines</h5>
        </a> 
				</div><!-- single-service -->

				<!-- single-service -->
				<div class="single-service">
        <a href="{{url('/Category/5')}}">
					<div class="services-icon"><img src="{{asset('campustranxact/images/icon/handshake.png')}}" alt="images" class="img-responsive"></div>
          <h5>Swap Zone</h5>
        </a>
				</div><!-- single-service -->

			
			</div><!-- services -->
      <!-- trending-ads -->
      <div class="section trending-ads">
        <div class="section-title tab-manu">
          <h4>Trending Ads</h4>
           <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="index-one.html#recent-ads"  data-toggle="tab">Recent Ads</a></li>
            <li role="presentation"><a href="index-one.html#popular" data-toggle="tab">Popular Ads</a></li>
            <li role="presentation"><a href="index-one.html#hot-ads"  data-toggle="tab">Hot Ads</a></li>
          </ul>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">
        @foreach($products as $product)
          <!-- tab-pane -->
          <div role="tabpanel" class="tab-pane fade in active" id="recent-ads">
            <!-- ad-item -->
            <div class="ad-item row">
              <!-- item-image -->
              <div class="item-image-box col-sm-3">
                <div class="item-image">
                <img src="{{url('public/'.$product->pictures[0]->url)}}" alt="Carousel Thumb" class="img-responsive">
                  <a href="index-one.html#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                </div><!-- item-image -->
              </div>

              <!-- rending-text -->
              <div class="item-info col-sm-9">
                <!-- ad-info -->
                <div class="ad-info">
                  <h3 class="item-price">&#8358;{{number_format($product->price)}}</h3>
                  <h4 class="item-title"><a href="/ProductShow/{{$product->id}}">{{$product->product_name}}</a></h4>
                  <div class="item-cat">
                    <span><a href="#">{{$product->category->category_name}}</a></span>
                  </div>
                </div><!-- ad-info -->

                <!-- ad-meta -->
                <div class="ad-meta">
                  <div class="meta-content">
                    <span class="dated"><a href="#">{{ date('d F Y', strtotime($product->created_at)) }} </a></span>
                    <a href="#" class="tag"><i class="fa fa-tags"></i>{{$product->status_id}}</a>
                  </div>
                  <!-- item-info-right -->
                  <div class="user-option pull-right">
                    <a href="index-one.html#" data-toggle="tooltip" data-placement="top" title="{{$product->user->university_id}}"><i class="fa fa-map-marker"></i> </a>
                    <a class="online" href="index-one.html#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>
                  </div><!-- item-info-right -->
                </div><!-- ad-meta -->
              </div><!-- item-info -->
            </div><!-- ad-item -->

           
          
          </div><!-- tab-pane -->
          @endforeach
        </div>
      </div><!-- trending-ads -->
			</div><!-- featureds -->



		</div><!-- container -->
	</section><!-- services-ad -->

	@stop
