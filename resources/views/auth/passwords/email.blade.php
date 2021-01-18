@extends('main')
@section('title', 'Забыли пароль')
@section('content')
<div class="container">
  <ul class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
    <li><a href="forgetpassword.html">Восстановление пароля</a></li>
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
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
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
    <div id="content" class="col-sm-9">
      <h1>Забыли пароль?</h1>
      <p>Введите адрес электронной почты, связанный с вашей учетной записью. Нажмите «Отправить», чтобы получить пароль по электронной почте.</p>
      <form action="{{ route('password.email') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}  
      <fieldset>        
          <legend>Ваш email адрес</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              <input type="email" name="email" value="{{ old('email') }}" placeholder="Введите email" id="email" class="form-control" />
            </div>
          </div>
        </fieldset>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="{{ route('login') }}" class="btn btn-default">Назад</a></div>
          <div class="pull-right">
            <input type="submit" value="Отправить" class="btn btn-primary" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
