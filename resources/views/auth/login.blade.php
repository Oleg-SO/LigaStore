@extends('main')

@section('title', 'Логин')

@section('content')
<div class="container">
  <ul class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="{{ route('login') }}">Логин</a></li>
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
              <a class="list-group-item" href="{{ route('login') }}">Войти</a> 
              <a class="list-group-item" href="{{ route('register') }}">Регистрация</a> 
              <a class="list-group-item" href="{{ route('password.request') }}">Забыли пароль</a>
              <a class="list-group-item" href="{{ route('users.edit') }}">Мой профиль</a>
              <a class="list-group-item" href="{{ route('orders.index') }}">Мои заказы</a>
         </div>
        </div>
      </div>
    </div>
    <div class="col-sm-9" id="content">
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <h2>Новый покупатель</h2>
            <p><strong>Регистрация аккаунта</strong></p>
            <p>Создав аккаунт, вы сможете делать покупки быстрее, быть в курсе статуса заказа, и отслеживать заказы, которые вы сделали ранее.</p>
            <a class="btn btn-primary" href="{{ route('register') }}">Перейти</a></div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <h2>Зарегистрированный пользователь</h2>           
            <form enctype="multipart/form-data" method="post" action="{{ route('login') }}">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="input-email" class="control-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Введите email" value="{{ old('email') }}" name="email">
              </div>
              <div class="form-group">
                <label for="input-password" class="control-label">Пароль</label>
                <input type="password" class="form-control" id="password" placeholder="Введите пароль" value="{{ old('password') }}" name="password">
                <a href="{{ route('password.request') }}">Забыли пароль</a></div>
              <input type="submit" class="btn btn-primary" value="Войти">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
