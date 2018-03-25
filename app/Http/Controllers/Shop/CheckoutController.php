<?php

namespace App\Http\Controllers\Shop;

use App\Mail\OrderNotification;
use App\Shop\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Shop\Products;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:shopUser');
        $this->middleware('isVerified');
    }

    public function index(Request $request){
        $cartObj = $request->session()->get('cart');
        $cart = $cartObj->cartItems ?? [];
        return view('shop.checkout.index', compact('cart'));
    }

    public function placeOrder(Request $request){
        $cart = $request->session()->get('cart')->cartItems;
        foreach ($cart as $item){
            Products::find($item['item']->id)->decrement('qty', $item['qty']);
            Orders::create([
                "user_id" => \Auth::id(),
                "total" => $item['item']->new_price * $item['qty'],
                "product_id" => $item['item']->id,
                "qty" => $item['qty'],
                "payment_method" => "payment on deleivery"
            ]);
        }
        Mail::to(env('MAIL_USERNAME'))->send(new OrderNotification($cart, \Auth::user()));
        $request->session()->forget('cart');
        return view('shop.checkout.success');
    }
}
