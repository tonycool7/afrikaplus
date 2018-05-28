<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function deleteUser(Request $request){
        $user = \Auth::user();

        foreach ($user->posts as $item){
            $item->likes()->delete();
            $item->comments()->delete();
        }

        foreach ($user->playlist as $item){
            $item->music()->delete();
        }

        $user->posts()->delete();
        $user->playlist()->delete();

        $user->blockList()->delete();

        User::destroy($user->id);

        return redirect('/');
    }
}
