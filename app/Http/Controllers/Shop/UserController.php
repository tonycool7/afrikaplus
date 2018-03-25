<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:shopUser');
        $this->middleware('isVerified');
    }

    public function index(){
        $orders = Auth::guard('shopUser')->user()->orders;
        return view('shop.account.index', compact('orders'));
    }

    public function editUser(Request $request){
        $user = Auth()->guard('shopUser')->user();
        if($request->password){
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        if($request->address){
            $user->update([
                'address' => $request->address
            ]);
        }

        if($request->telephone){
            $user->update([
                'phone' => $request->telephone
            ]);
        }

        return response()->json([
            'result' => 'update successful'
        ]);
    }
}
