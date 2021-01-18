@extends('main')

@section('title', 'Спасибо')


@section('content')

   <div class="thank-you-section" style="height: 500px;">
       <h1>Спасибо за заказ</h1>
       <p>Ожидайте звонка в течении 30 минут</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">На Главную</a>
       </div>
   </div>




@endsection
