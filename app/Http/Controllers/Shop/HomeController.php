<?php

namespace App\Http\Controllers\Shop;

use App\Shop\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index(){
        $products = Products::orderBy('created_at', 'desc')->get()->take(5);

        return view('shop.home', compact('products'));
    }
}
