@extends('main')

@section('title', 'Продукты')


@section('content')
		<!-- Start Shop Page -->
		<br>
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
		<br>
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
					<br>
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
								<h3 class="wedget__title"> <i class="fa fa-bars" >Категории товаров</i></h3>
								<div class="container">
									<ul class="accordion-menu">
										@foreach($categories as $_category)
											@if($_category->products()->count() == null)
											<li>
												<div class="dropdownlink"><a>{{ $_category->name }}</a><i class="fa fa-chevron-down" aria-hidden="true"></i></div>																									                  				  		 	<ul class="submenuItems" id="submenuItems">
													@foreach($category as $categor)
													@if ($categor->parent_id == $_category->id)
													<li><a href="{{ route('shop.index', ['category' => $categor->slug]) }}">{{ $categor->name }}</a></li>
																@endif
															@endforeach
												</ul>
                						    </li>
               								 @else
                    						<div class="mobile-link"><li><a href="{{ route('shop.index', ['category' => $_category->slug]) }}">{{ $_category->name }}</a></div>
                   							 @endif
               							 @endforeach
								</div>
        					</aside>
        				</div>
					</div>
					
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
			                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
			                        </div>
									<form action="{{ route('shop.index')}}" method="GET" id="selectform">
										<div class="orderby__wrapper">
											<span>Сортировать</span>
												<select class="shot__byselect" name="sort" form="selectform" >
													<option value="none">Поумолчанию</option>
													<option value="low_high">Цена по возрастанию</option>
													<option value="high_low">Цена по убыванию</option>
													<option value="a_to_z">Название А-Я</option>
													<option value="z_to_a">Название Я-А</option>
												</select>
										</div>
									</form>

		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row" id="select-res">
	        						<!-- Start Single Product -->
									@forelse ($products as $product)
		        					<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
			        					<div class="product__thumb">
											<a class="first__img" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{$product->image}}" alt="{{ $product->name }}"></a>
											<a class="second__img animation1" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{$product->image}}" alt="{{ $product->name }}"></a>

										</div>
										<div class="product__content content--center">
											<h4><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h4>
											<ul class="prize d-flex">
												<li>{{ presentPrice($product->price) }}</li>
												<!-- <li class="old_prize">$35.00</li> -->
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
									<div style="text-align: left; margin-left: 15px;">Товары отсутсвуют</div>
									@endforelse
		        					<!-- End Single Product -->

	        					</div>
								{{ $products->appends(request()->input())->links() }}
	        					
	        				</div>
	        				<div class="shop-grid tab-pane fade" id="nav-list" role="tabpanel">
	        					<div class="list__view__wrapper" id="select-result">
								@forelse ($products as $product)
	        						<!-- Start Single Product -->
	        						<div class="list__view">
	        							<div class="thumb">
	        								<a class="first__img" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{ $product->image }}" alt="{{ $product->name }}"></a>
	        								<a class="second__img animation1" href="{{ route('shop.show', $product->slug) }}"><img src="../storage/{{ $product->image }}" alt="{{ $product->name }}"></a>
	        							</div>
	        							<div class="content">
	        								<h2><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></h2>
	        								<ul class="rating d-flex">
													@for($i = 0; $i < ceil($product->reviews->avg('rating')); $i++)
													<li class="on"><i class="fa fa-star-o"></i></li>
													@endfor
													@for($i = 0; $i < 5-ceil($product->reviews->avg('rating')); $i++)
													<li><i class="fa fa-star-o"></i></li>
													@endfor
											</ul>
	        								<ul class="prize__box">
	        									<li>{{ presentPrice($product->price) }}</li>
	        									<!-- <li class="old__prize">$220.00</li> -->
	        								</ul>
	        								<p>{{ $product->description }}</p>
	        								<ul class="cart__action d-flex">
	        									<li class="cart">
													<form action="{{ route('cart.store', $product) }}" method="POST" id="myform">
														{{ csrf_field() }}
														<input type="hidden" name="price" value="price_soft">
														<button type="submit" style="border:none; all:unset;"><a class="cart">В корзину</a></button>
													</form>
												</li>
	        								</ul>

	        							</div>
	        						</div>
	        						<!-- End Single Product -->
								@empty
								<div style="text-align: left">Товары отсутсвуют</div>
								@endforelse
	        					</div>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
		<!-- End Shop Page -->




@endsection
