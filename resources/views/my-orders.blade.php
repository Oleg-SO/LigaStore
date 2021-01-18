@extends('main')

@section('title', 'Мои заказы')

@section('content')
<div class="container">
  <ul class="breadcrumb" style="margin-top:140px;">
    <li><a href="/my-profile"><i class="fa fa-home"></i></a></li>
    <li><a href="/my-profile">Мой профиль</a></li>
  </ul>
  @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
  <div class="row">
    <div class="col-sm-3 hidden-xs column-left" id="column-left">
      <div class="column-block">
        <div class="columnblock-title">Аккаунт</div>
        <div class="account-block">
          <div class="list-group">               
              <a class="list-group-item" href="{{ route('users.edit') }}">Мой профиль</a>
              <a class="list-group-item" href="{{ route('orders.index') }}">Мои заказы</a>
         </div>
        </div>
      </div>
    </div>

    <div class="col-sm-9" id="content">
      <div class="row">
         @foreach ($orders as $order)
            <div class="table-responsive">
                <table class="table table">
                       <h2>№ ID заказа {{ $order->id }}</h2>
                            <tr>
                                <td class="text-center">Дата заказа</td>           
                                <td class="text-left">Сумма</td>                                
                            </tr>
                                         
                    <tr>
                        <td class="text-center">{{ presentDate($order->created_at) }}</td>
                        <td class="text-left">{{ presentPrice($order->billing_total) }}</td>
                    </tr>
                   
                   
                </table>                      
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center">Фото</td>
                                <td class="text-left">Название продукта</td>               
                                <td class="text-left">Количество</td>
                                <td class="text-right">Цена</td>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($order->products as $product)
                    <tr>
                        <td class="text-center"><a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="Фото заказа" height="150px"></a></td>
                        <td class="text-left"><a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></td>
                        <td class="text-left">{{ $product->pivot->quantity }}</td>
                        <td class="text-right">{{ presentPrice($product->price) }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        @endforeach
    </div>
  </div>
</div>
  


@endsection

