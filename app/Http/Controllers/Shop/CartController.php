<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Shop\Products;
use App\Shop\Cart;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct()
    {
    }

    public function add(Request $request, $id){
        $product = Products::findOrFail($id);
        $oldCart = $request->session()->get('cart') ?? null;
        $cart = new Cart($oldCart);
        $cart->add($product);
        $request->session()->put('cart', $cart);
        return response()->json(['total' => $cart->totalPrice]);
//        return redirect()->back();
    }

    public function deleteItem(Request $request, $id){
        $cart = $request->session()->get('cart') ?? null;
        if(array_key_exists($id, $cart->cartItems)){
            $cart->totalPrice = $cart->totalPrice - $cart->cartItems[$id]['price'];
            $cart->totalQty = $cart->totalQty - $cart->cartItems[$id]['qty'];
            unset($cart->cartItems[$id]);
        }
        $request->session()->put('cart', $cart);
        return response()->json([
        ]);
    }

    public function cart(Request $request){
        return view('shop.cart.index');
    }

    public function fetchCart(Request $request){
        $cartObj = $request->session()->get('cart');
        $cart = $cartObj->cartItems ?? "empty";

        return response()->json([
            'cart' => $cart,
            'totalPrice' => $cartObj->totalPrice
        ]);
    }

}
