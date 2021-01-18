@extends('main')

<title>Поиск по товарам - {{ request()->input('query') }}</title>

@section('content')

    <h1 style="margin: 60px 60px; margin-top: 135px; text-align: center;">Вы искали - '{{ request()->input('query') }}'</h1>
    <div class="container" style="margin-bottom: 60px;">
    <div class="shop-product-content tab-content">
        <div id="grid-sidebar7" class="tab-pane fade active show">
            <div class="row">
            @forelse ($products as $product)
									<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
										  <div class="product__thumb">
                         <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product" height="200px"></a>
										  	  <a class="second__img animation1" href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="product image"></a>
											   <div class="hot__box">
												<span class="hot-label">Результат поиска</span>
											</div>
                  </div>                   
										<div class="product__content content--center">
											<h4><a href="single-product.html">{{ $product->name }}</a></h4>
											<ul class="prize d-flex">
												<li>{{ presentPrice($product->price) }}</li> 
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
										</div>
                  </div> 
                  @empty
                @endforelse
            </div>
        </div>
    </div>
      <!-- {{ $products->appends(request()->input())->links() }} -->
  </div>

@endsection
