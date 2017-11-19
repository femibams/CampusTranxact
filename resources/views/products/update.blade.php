@extends('layouts.master')
			@section('content')
			<!-- main -->
			<section id="main" class="clearfix ad-details-page">
					<div class="container">
					
						<div class="breadcrumb-section">
							<!-- breadcrumb -->
							<ol class="breadcrumb">
								<li><a href="index.html">Home</a></li>
								<li>Ad Post</li>
							</ol><!-- breadcrumb -->						
							<h2 class="title">Mobile Phones</h2>
						</div><!-- banner -->

						<div class="adpost-details">
							<div class="row">	
								<div class="col-md-8">
									<form class="form-horizontal" method="POST" action="{{url('/product_update')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
										<fieldset>
											<div class="section postdetails">
												<h4>Sell an item or service <span class="pull-right">* Mandatory Fields</span></h4>
												
												
												<div class="row form-group add-image">
													<label class="col-sm-3 label-title">Photos for your ad <span>(This will be your cover photo )</span> </label>
													<div class="col-sm-9">
														<h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload / Drag and Drop Files <span>You can add multiple images.</span></h5>
														<input type="file" name="picture[]" multiple>
														
													</div>
												</div>
												<div class="row form-group select-condition">
													<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
													<label class="col-sm-3">Condition<span class="required">*</span></label>
													<div class="col-sm-9">
													<input type="radio" name="status" value="used" id="used"value="{{ old('status') }}"> <label for="used">used</label>
													<input type="radio" name="status" value="new" id="new"value="{{ old('status') }}"> <label for="new">new</label>	
														
														@if ($errors->has('status'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('status') }}</strong>
                                                            </span>
                                                        @endif
													</div>
												</div>
												</div>

												<div class="row form-group select-condition">
													<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
													<label class="col-sm-3">Category<span class="required">*</span></label>
													<div class="col-sm-9">
													<select class="form-control" name="category" required>
                                                    @foreach($categories as $category)
                                                    @if($category->id == $product->category_id)
                                                    <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                                                    @else
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                    @endif
														<!-- @if ($errors->has('status'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('status') }}</strong>
                                                                    </span>
                                                            @endif -->
													@endforeach
													</select>
													</div>
												</div>
												</div>
											

												<div class="row form-group select-price">
													<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
													<label class="col-sm-3 label-title">Price<span class="required">*</span></label>
													<div class="col-sm-9">
														<label>Naira</label>
														<input type="text" name="price" value="{{$product->price}}" class="form-control" id="price" required>
														@if ($errors->has('price'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('price') }}</strong>
                                                            </span>
                                                        @endif
													</div>
													</div> 
												</div>
												<div class="row form-group brand-name">
													<div class="form-group{{ $errors->has('productname') ? ' has-error' : '' }}">
													<label class="col-sm-3 label-title">Product Name<span class="required">*</span></label>
													<div class="col-sm-9">
														<input type="text" name="productname" value="{{$product->product_name}}" class="form-control" placeholder="ex, Sony Xperia" required>
														@if ($errors->has('productname'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('productname') }}</strong>
                                                            </span>
                                                        @endif
													</div>
												</div>
												</div>    
												
												<div class="row form-group item-description">
													<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
													<label class="col-sm-3 label-title">Description<span class="required">*</span></label>
													<div class="col-sm-9">
														<textarea class="form-control" name="description" id="description" placeholder="Write few lines about your products" rows="8" required>{{$product->product_description}}</textarea>
														@if ($errors->has('description'))
												<span class="help-block">
													<strong>{{ $errors->first('description') }}</strong>
												</span>
											@endif   
													</div>
													</div>      
												</div>
												<div class="row">
													<div class="col-sm-9 col-sm-offset-3">
														<p>5000 characters left</p>
													</div>
												</div>								
											</div><!-- section -->
											
										<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
											
											
											
											<div class="checkbox section agreement">
												<label for="send">
													<input type="checkbox" name="send" id="send">
													Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www By clicking "Post", you agree to our <a href="ad-post-details.html#">Terms of Use</a> and <a href="ad-post-details.html#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer.
												</label>
												<button type="submit" class="btn btn-primary">Post Your Ad</button>
											</div><!-- section -->
											
										</fieldset>
									</form><!-- form -->	
								</div>
							

								<!-- quick-rules -->	
								<div class="col-md-4">
									<div class="section quick-rules">
										<h4>Quick rules</h4>
										<p class="lead">Posting an ad on <a href="ad-post-details.html#">Trade.com</a> is free! However, all ads must follow our rules:</p>

										<ul>
											<li>Make sure you post in the correct category.</li>
											<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
											<li>Do not upload pictures with watermarks.</li>
											<li>Do not post ads containing multiple items unless it's a package deal.</li>
											<li>Do not put your email or phone numbers in the title or description.</li>
											<li>Make sure you post in the correct category.</li>
											<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
											<li>Do not upload pictures with watermarks.</li>
											<li>Do not post ads containing multiple items unless it's a package deal.</li>
										</ul>
									</div>
								</div><!-- quick-rules -->	
							</div><!-- photos-ad -->				
						</div>	
					</div><!-- container -->
				</section><!-- main -->
			@endsection
				
				
