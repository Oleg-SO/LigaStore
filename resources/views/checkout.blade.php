@extends('main')

<title>Заказ</title>
<meta name="description" content="Заказ">

@section('content')
<!-- Start Checkout Area -->
<section class="wn__checkout__area section-padding--lg bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wn_checkout_wrap">
                    <div class="checkout_info">
                        <span>Есть аккаунт?</span>
                        <a class="showlogin" href="#">Нажмите чтобы войти</a>
                    </div>

                    <div class="checkout-area ptb-100">
                        <div class="container">
                        @if (session()->has('success_message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success_message') }}
                                    </div>
                                @endif
                    
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                              @if($error = 'validation.required')
                                               <li>Не заполнены объязательные поля</li>
                                              @else
                                                <li>{{ $error }}</li>
                                              @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
        					<div class="checkout_login">
        						<form class="wn__checkout__form" action="{{ route('login') }}">
                                {{ csrf_field() }}
        							<p>Если вы были зарегистированны ранее введите ваш логин и пароль!</p>

        							<div class="input__box">
        								<label>Email <span>*</span></label>
        								<input type="text">
        							</div>

        							<div class="input__box">
        								<label>Пароль <span>*</span></label>
        								<input type="password">
        							</div>
        							<div class="form__btn">
        								<button>Войти</button>
        							</div>
        						</form>
        					</div>        					
        				</div>
        			</div>
                </div>
                <form class="form-horizontal" action="{{ route('checkout.store') }}" method="POST">
              {{ csrf_field() }}
        		<div class="row">
        			<div class="col-lg-6 col-12">
        				<div class="customer_details">
        					<h3>Детали оформления</h3>
        					<div class="customar__field">
        						<div class="margin_between">
	        						<div class="input_box space_between">
	        							<label>Имя <span>*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Введите имя" value="{{ old('name') }}" name="name">
	        						</div>
        						</div>        						
        						<div class="input_box">
        							<label>Адрес <span>*</span></label>
        							<input type="text" class="form-control" id="address" placeholder="Введите адрес" value="{{ old('address') }}" name="address">
                                </div>
                                <div class="input_box">
        							<label>Город <span>*</span></label>
        							<input type="text" class="form-control" id="city" placeholder="Введите город" value="{{ old('city') }}" name="city">
        						</div>
								<div class="margin_between">
									<div class="input_box space_between">
										<label>Номер телефона <span>*</span></label>
										<input type="text" class="form-control" id="phone" placeholder="Введите номер телефона" value="{{ old('phone') }}" name="phone">
									</div>

									<div class="input_box space_between">
                                        <label>Email <span>*</span></label>
                                        @if (auth()->user())
                                            <input type="email" class="form-control" id="email" placeholder="Введите email" value="{{ auth()->user()->email }}" name="email">
                                            @else
                                            <input type="email" class="form-control" id="email" placeholder="Введите email" value="{{ old('email') }}" name="email">
                                        @endif									
									</div>
								</div>
        					</div>       					
        				</div>       				
        			</div>
        			<div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
        				<div class="wn__order__box">
        					<h3 class="onder__title">Ваш заказ</h3>
        					<ul class="order__total">
        						<li>Товар</li>
        						<li>Цена</li>
                            </ul>
                            @foreach (Cart::content() as $item)
        					<ul class="order_product">
        						<li> {{ $item->model->name }} × {{ $item->qty }} шт<span>- {{ $item->model->presentPrice()}}</span></li>
                            </ul>
                            @endforeach
        					<ul class="total__amount">
        						<li>Общая сумма <span>{{ presentPrice(Cart::subtotal()) }}</span></li>
        					</ul>
        				</div>					   
                    </div>
                    <input type="submit" class="btn btn-primary" value="Оформить заказ">
        		</div>
        	</div>
        </section>
    </form>
        <!-- End Checkout Area -->
@endsection