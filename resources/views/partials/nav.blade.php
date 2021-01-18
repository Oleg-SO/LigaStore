	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
        <!-- Header -->
		<header id="wn__header" class="header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="/">
								<img src="/images/logo/LigaStore.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<li class="drop with--one--item"><a href="/">Главная</a></li>
								 <li class="drop"><a href="/shop">Витрина</a></li>								
								<li class="drop"><a href="#">Электротовары</a>
									<div class="megamenu mega03">									
										@foreach($categories as $_category)
											@if($_category->products()->count() == null && $_category->name == 'Электроинструменты' )
												<ul class="item item03">
													<li class="title">{{ $_category->name }}</li>
													@foreach($category as $categor)
													@if ($categor->parent_id == $_category->id && $_category->name == 'Электроинструменты')
															<li><a href="{{ route('shop.index', ['category' => $categor->slug]) }}">{{ $categor->name }}</a></li>
														@endif
													@endforeach
												</ul>
											@endif
										@endforeach											
									</div>
								</li>
								<li class="drop"><a href="shop-grid.html">Ручной инструмент</a>
									<div class="megamenu mega02">
										@foreach($categories as $_category)
											@if($_category->products()->count() == null && $_category->name == 'Расходный инструмент' )
												<ul class="item item02">
													<li class="title">{{ $_category->name }}</li>
													@foreach($category as $categor)
													@if ($categor->parent_id == $_category->id && $_category->name == 'Расходный инструмент')
															<li><a href="{{ route('shop.index', ['category' => $categor->slug]) }}">{{ $categor->name }}</a>
														</li>
														@endif
													@endforeach
												</ul>
											@endif
										@endforeach
									</div>
								</li>
								<li class="drop"><a href="#">Сантехника</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="about.html">About Page</a></li>
											<li class="label2"><a href="portfolio.html">Portfolio</a>
												<!-- <ul>
													<li><a href="portfolio.html">Portfolio</a></li>
													<li><a href="portfolio-details.html">Portfolio Details</a></li>
												</ul> -->
											</li>
											<li><a href="my-account.html">My Account</a></li>
											<li><a href="cart.html">Cart Page</a></li>
											<li><a href="checkout.html">Checkout Page</a></li>
											<li><a href="wishlist.html">Wishlist Page</a></li>
											<li><a href="error404.html">404 Page</a></li>
											<li><a href="faq.html">Faq Page</a></li>
											<li><a href="team.html">Team Page</a></li>
										</ul>
									</div>
								</li>
								<li class="drop"><a href="blog.html">О нас</a>
									<div class="megamenu dropdown">
										<ul class="item item01">
											<li><a href="blog.html">Blog Page</a></li>
										</ul>
									</div>
								</li>
								<li><a href="/contacts">Контакты</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							<li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">{{ Cart::instance('default')->count()}}</span></a>
								<!-- Start Shopping Cart -->
								<div class="box-search-content search_active block-bg close__top">
										<form id="search_mini_form" class="minisearch" action="{{ route('search') }}" method="GET">
											<div class="field__search">
												<input type="text" placeholder="Поиск товара..." type="text" name="query" id="query" value="{{ request()->input('query') }}" required>
												<div class="action">
													<a href="" ><button class="zmdi zmdi-search"></button><i class="zmdi zmdi-search"></i></a>
												</div>
											</div>
										</form>
										<div class="close__wrap">
											<span>Закрыть</span>
										</div>
									</div>
								<div class="block-minicart minicart__active">
									<div class="minicart-content-wrapper">
										<div class="micart__close">
											<span>Закрыть</span>
										</div>
										<div class="items-total d-flex justify-content-between">
										@if (Cart::instance('default')->count() > 0)
											<span>{{ Cart::instance('default')->count()}} товар(ов)</span>
											@else
											<i class="ti-shopping-cart"></i>
                            				<span class="shop-count-furniture green">0 товар(ов)</span>
                            			@endif
											<span>Общая сумма</span>
										</div>
										<div class="total_amount text-right">
											<span>{{ presentPrice(Cart::subtotal()) }}</span>
										</div>
										<div class="mini_action checkout">
											<a class="checkout__btn" href="{{ route('checkout.index') }}">Оформить</a>
										</div>
										
										@foreach (Cart::content() as $item)
										<div class="single__items">
											<div class="miniproduct">
												<div class="item01 d-flex">
													<div class="thumb">
														<a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" alt="product images"></a>
													</div>
													<div class="content">
														<h6><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></h6>
														<span class="prize">{{ $item->model->presentPrice() }} x {{ $item->qty }}</span>
														<div class="product_prize d-flex justify-content-between">
															<span class="qun">Количество-{{ $item->qty }}</span>
															<ul class="d-flex justify-content-end">
																<form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
																	{{ csrf_field() }}
																	{{ method_field('DELETE') }}
																<button lass="btn btn-danger btn-xs" title="Удалить товар с корзины?" type="submit">Удалить</li></button>
															</form>
															</ul>
														</div>
													</div>
												</div>
												</div>
													</div>
												
												@endforeach
								<!-- End Shopping Cart -->
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">
											<strong class="label switcher-label">
												<span>Мой аккаунт</span>
											</strong>
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														@guest
																<span><a href="{{ route('login') }}">Войти</a></span>
																<span><a href="{{ route('register') }}">Регистрация</a></span>
															@else
																<span><a href="{{ route('users.edit') }}">Личный кабинет</a></span>
																<span><a href="{{ route('orders.index') }}">Мои заказы</a></span>
																<span><a href="{{ route('logout') }}"
															onclick="event.preventDefault();
																	document.getElementById('logout-form').submit();"><span>Выйти</span></a></span>
																	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																		{{ csrf_field() }}
																	</form>
														@endguest
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<li><a href="/">Home</a></li>
								<li><a href="#">Pages</a>
									<ul>
										<li><a href="about">About Page</a></li>
										<li><a href="portfolio.html">Portfolio</a>
											<ul>
												<li><a href="portfolio.html">Portfolio</a></li>
												<li><a href="portfolio-details.html">Portfolio Details</a></li>
											</ul>
										</li>
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="cart.html">Cart Page</a></li>
										<li><a href="checkout.html">Checkout Page</a></li>
										<li><a href="wishlist.html">Wishlist Page</a></li>
										<li><a href="error404.html">404 Page</a></li>
										<li><a href="faq.html">Faq Page</a></li>
										<li><a href="team.html">Team Page</a></li>
									</ul>
								</li>
								<li><a href="shop">Shop</a>
									<ul>
										<li><a href="shop">Shop Grid</a></li>
										<li><a href="single-product.html">Single Product</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a>
									<ul>
										<li><a href="blog.html">Blog Page</a></li>
										<li><a href="blog-details.html">Blog Details</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		
		<!-- //Header -->