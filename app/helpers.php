<?php

use Carbon\Carbon;
use App\Currency;

function presentPrice($price)
{
    // return number_format($price , 0, '.', ' '). ' ₸' ;
    $currency = Currency::get();
     return number_format($price*$currency[0]->value , 0, '.', ' '). ' ₸' ;
  
   
}

function presentDate($date)
{
    return Carbon::parse($date)->format('d.m.Y');
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > setting('site.stock_threshold', 5)) {
        $stockLevel = '<span class="badge progress-bar-success">В наличии</span>';
    } elseif ($quantity <= setting('site.stock_threshold', 5) && $quantity > 0) {
        $stockLevel = '<span class="badge progress-bar-warning">Мало в наличии</span>';
    } else {
        $stockLevel = '<span class="badge progress-bar-danger">Нет в наличии</span>';
    }

    return $stockLevel;
}

function isActive(bool $boolean, bool $withClass = true)
{
    if ($boolean) {
        echo ($withClass) ? 'class="is-active"' : ' is-active';
    }
}
