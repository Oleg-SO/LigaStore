<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = Product::mightAlsoLike()->get();
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();

        $products = Product::mightAlsoLike()->get();

        return view('cart')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'products' => $products,
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' => getNumbers()->get('newSubtotal'),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $qty = isset($_POST['qty']) ? $_POST['qty'] : 1;

        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Товар уже в вашей корзине!');
        }

        Cart::add($product->id, $product->name, $qty, $product->price)
            ->associate('App\Product');

        return back()->with('success_message', 'Товар добавлен в вашу корзину!');
        // return redirect()->route('cart.index')->with('success_message', 'Товар добавлен в вашу корзину!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric'
        ]);

        // if ($validator->fails()) {
        //     session()->flash('errors', collect(['Количество должно быть от 1 до 5.']));
        //     return response()->json(['success' => false], 400);
        // }

        // if ($request->quantity > $request->productQuantity) {
        //     session()->flash('errors', collect(['В настоящее время у нас недостаточно товаров на складе.']));
        //     return response()->json(['success' => false], 400);
        // }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Количество было успешно обновлено!');
        return back()->with('success_message', 'Количество было успешно обновлено!');
        // return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', 'Товар был удален!');
    }

    /**
     * Switch item for shopping cart to Save for Later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Товар уже сохранен на потом!');
        }

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Товар был сохранен на потом!');
    }
}
