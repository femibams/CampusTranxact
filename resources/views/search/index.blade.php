@extends('layouts.master')
@section('content')
<div class="row">
@if(count($products))
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
										  <a href="#" data-toggle="tooltip" data-placement="top" title="{{$product->user->university_id}}"><i class="fa fa-map-marker"></i> </a>
      									<a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-suitcase"></i> </a>
      								</div>
      								<!-- item-info-right -->
      								<div class="user-option pull-right">
      									
      								</div><!-- item-info-right -->
      							</div><!-- ad-meta -->
      						</div><!-- featured -->
      					</div><!-- featured -->
                      @endforeach
                       <!--pagination -->
					  {{$products->links()}} 
					  <!-- pagination  -->  
      @else
      {{ session()->flash('message','No products for this category yet')}}
      @endif					
					  </div><!-- row -->
@stop