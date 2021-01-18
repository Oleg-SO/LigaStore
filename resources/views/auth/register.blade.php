@extends('main')

@section('title', 'Регистрация')

@section('content')
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="register.html">Регистрация</a></li>
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
                        @if($error == 'validation.confirmed')
                            <li>Пароли не совпадают</li>
                        @elseif($error == 'validation.min.string')
                        <li>Пароль должен состоять из больше символов</li>
                        @else
                        <li>{{ $error}}</li>
                        @endif
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
            <h1>Регистрация аккаунта</h1>
            <p>Если у вас уже есть аккаунт можете <a href="{{ route('login') }}">Войти</a>.</p>
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('register') }}">
                {{ csrf_field() }}
                <fieldset id="account">

                    <legend>Ваши персональные данные</legend>
                    <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Введите имя" value="{{ old('name') }}" name="name">
                        </div>
                    </div>

                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Введите E-Mail" value="{{ old('email') }}" name="email">
                        </div>
                    </div>

                </fieldset>
                <fieldset>
                    <legend>Ваш пароль</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder="Введите пароль" value="" name="password">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">Подтвердите пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password-confirm" placeholder="Подтвердите пароль" value="" name="password_confirmation">
                        </div>
                    </div>
                </fieldset>

                <div class="buttons">
                    <div class="pull-right">Я прочитал и согласен с <a class="agree" href="#"><b>политикой конфиденциальности</b></a>
                        <input type="checkbox" value="1" name="agree">
                        &nbsp;
                        <input type="submit" class="btn btn-primary" value="Регистрация">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
