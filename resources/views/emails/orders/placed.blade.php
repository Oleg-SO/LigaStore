@component('mail::message')
# Заказ принят

Спасибо Вам за ваш заказ.

**Заказ №:** {{ $order->id }}

**Email:** {{ $order->billing_email }}

**Имя:** {{ $order->billing_name }}

**Телефон:** {{ $order->billing_phone }}

**Сумма заказа:** {{ presentPrice($order->billing_total) }}

**Детали доставки:** {{ $order->billing_city}} . {{ $order->billing_address}}

**Ваш заказ: **

@foreach ($order->products as $product)
Название: {{ $product->name }} <br>
Модель: {{ $product->details}} <br>
Цена: {{ $product->presentPrice()}} <br>
Количество: {{ $product->pivot->quantity }} <br>
@endforeach

Вы можете получить больше информации по ссылке ниже.

@component('mail::button', ['url' => 'http://ligastore.kz/my-orders/', 'color' => 'green'])
Мои заказы
@endcomponent

Спасибо еще раз за Ваш выбор.

С наилучшими пожеланиями,<br>
temp-tools.kz
@endcomponent
