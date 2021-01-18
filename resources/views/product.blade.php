
    @extends('main')

    @section('title')

    @section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">{{$product->name}}</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="/shop">Назад</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">{{$product->name}}</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start main Content -->
        <div class="maincontent bg--white pt--80 pb--55">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
		        							  <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product image"></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1>{{$product->name}}</h1>
        								<div class="price-box">
                                            <span>{{ presentPrice($product->price) }}</span>
                                            <p>Модель - {{ $product->details }}</p>
        								</div>
                                        <div class="product-reviews-summary d-flex">
                                            <ul class="rating-summary d-flex">
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li><i class="zmdi zmdi-star-outline"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                                <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                            </ul>
                                        </div>
										<div class="product__overview">
        									<p>{{ $product->description }}</p>

        								</div>
        								<div class="box-tocart d-flex">
                                            <span>Количество</span>
                                                <form action="{{ route('cart.store', $product) }}" method="POST">
                                                    {{ csrf_field() }}
                                                   <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
                                                     <div class="addtocart__actions">
                                                        <button class="tocart" type="submit" title="Add to Cart">В корзину</button>
                                                     </div>
                                                </form>
											<div class="product-addto-links clearfix">
												<a class="wishlist" href="#"></a>
												<a class="compare" href="#"></a>
											</div>
        								</div>
										<div class="product_meta">
											<span class="posted_in">Категория: 
											@foreach($categories as $_category)
											@foreach($category as $categor)
													@if ($categor->parent_id == $_category->id && $_category->name == 'Расходный инструмент')
															<a href="{{ route('shop.index', ['category' => $categor->slug]) }}">{{ $categor->name }}</a>
														
														@endif
													@endforeach
													@endforeach
											</span>
										</div>
										<div class="product-share">
											<ul>
												<li class="categories-title">Share :</li>
												<li>
													<a href="#">
														<i class="icon-social-twitter icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-tumblr icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-facebook icons"></i>
													</a>
												</li>
												<li>
													<a href="#">
														<i class="icon-social-linkedin icons"></i>
													</a>
												</li>
											</ul>
										</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="product__info__detailed">
							<div class="pro_details_nav nav justify-content-start" role="tablist">
	                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
	                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab">Reviews</a>
	                        </div>
	                        <div class="tab__container">
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
									<div class="description__attribute">
                                        @if($specs)
                                            @foreach($specs as $spec)
                                                @foreach($spec as $_spec)
                                                    <p>{{ $_spec->name }}:</p>
                                                        @foreach($product_specs as $product_spec)
                                                            @if($product_spec->specification_id === $_spec->id)
                                                                <p class="specs_value">{{ $product_spec->value }}</p> 
                                                            @endif
                                                        @endforeach
                                                @endforeach
                                            @endforeach
                                        @endif
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        	<!-- Start Single Tab Content -->
	                        	<div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
									<div class="review__attribute">
										<h1>Customer Reviews</h1>
										<h2>Hastech</h2>
										<div class="review__ratings__type d-flex">
											<div class="review-ratings">
												<div class="rating-summary d-flex">
													<span>Quality</span>
			    									<ul class="rating d-flex">
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>

												<div class="rating-summary d-flex">
													<span>Price</span>
			    									<ul class="rating d-flex">
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
												<div class="rating-summary d-flex">
													<span>value</span>
			    									<ul class="rating d-flex">
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
											</div>
											<div class="review-content">
												<p>Hastech</p>
												<p>Review by Hastech</p>
												<p>Posted on 11/6/2018</p>
											</div>
										</div>
									</div>
									<div class="review-fieldset">
										<h2>You're reviewing:</h2>
										<h3>Chaz Kangeroo Hoodie</h3>
										<div class="review-field-ratings">
											<div class="product-review-table">
												<div class="review-field-rating d-flex">
													<span>Quality</span>
													<ul class="rating d-flex">
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
												<div class="review-field-rating d-flex">
													<span>Price</span>
													<ul class="rating d-flex">
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
												<div class="review-field-rating d-flex">
													<span>Value</span>
													<ul class="rating d-flex">
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
														<li class="off"><i class="zmdi zmdi-star"></i></li>
			    									</ul>
												</div>
											</div>
										</div>
										<div class="review_form_field">
											<div class="input__box">
												<span>Nickname</span>
												<input id="nickname_field" type="text" name="nickname">
											</div>
											<div class="input__box">
												<span>Summary</span>
												<input id="summery_field" type="text" name="summery">
											</div>
											<div class="input__box">
												<span>Review</span>
												<textarea name="review"></textarea>
											</div>
											<div class="review-form-actions">
												<button>Submit Review</button>
											</div>
										</div>
									</div>
	                        	</div>
	                        	<!-- End Single Tab Content -->
	                        </div>
        				</div>
						<div class="wn__related__product pt--80 pb--50">
							<div class="section__title text-center">
								<h2 class="title__be--2">Еще наши товары</h2>
							</div>
							<div class="row mt--60">
							<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
                                    <!-- Start Single Product -->
                                    @forelse ($products as $product)
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										<div class="product__thumb">
                                            <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product" height="200px"></a>
											<a class="second__img animation1" href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product image"></a>
											<div class="hot__box">
												<span class="hot-label">Частые</span>
											</div>
                                        </div>
                                        
										<div class="product__content content--center">
											<h4><a href="single-product.html">{{ $product->name }}</a></h4>
											<ul class="prize d-flex">
												<li>{{ presentPrice($product->price) }}</li>
												<li class="old_prize">$35.00</li>
											</ul>
											<div class="action">
												<div class="actions_inner">
													<ul class="add_to_links">
														<li>
                                                            <form action="{{ route('cart.store', $product) }}" method="POST" id="myform">
                                                                 {{ csrf_field() }}
                                                                    <input type="hidden" name="price" value="price_soft">
                                                                    <button type="submit" style="border:none; all:unset;"><a class="cart"><i class="bi bi-shopping-cart-full"></i></a></button>
															</form>
														</li>
														<!-- <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
														<li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
														<li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li> -->
													</ul>
												</div>
											</div>
											<div class="product__hover--content">
												<ul class="rating d-flex">
                                                    @for($i = 0; $i < ceil($product->reviews->avg('rating')); $i++)
                                                        <li class="on"><i class="fa fa-star"></i></li>
                                                    @endfor
                                                      @for($i = 0; $i < 5-ceil($product->reviews->avg('rating')); $i++)
                                                         <li><i class="fa fa-star-o"></i></li>
                                                      @endfor
												</ul>
											</div>
										</div>
                                    </div> 
                                    @empty
                                    @endforelse
									<!-- Start Single Product -->
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End main Content -->
	@endsection