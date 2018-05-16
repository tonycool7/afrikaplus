<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\Posts;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isVerified');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = \Auth::user()->username;
        return redirect('/profile/'.$username);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userObj = \App\User::where('username', $id)->first();
        $authorized = ($userObj->id == \Auth::id()) ? true : false;

        $user = [
            'authorized' => $authorized,
            'userDetails' => $userObj->toArray(),
            'posts' => $userObj->posts->toArray()
        ];

        return view('profile.profile', compact('user'));
    }

    public function showJson($id)
    {
        $userObj = \App\User::where('username', $id)->first();

        $user = [
            'userDetails' => $userObj->toArray(),
            'posts' => $userObj->posts->toArray()
        ];

        return response()->json([
            'user' => $user
        ]);
    }

    public function uploadAvatar(Request $request){
        $user = \App\User::findOrFail($request->user_id);

        if($request->hasFile('avatar')){
            $image = $request->file('avatar')->getClientOriginalName();
            $request->avatar->storeAs('avatar', $image);
        }else{
            return response()->json([
                'result' => 'Image unable to upload'
            ]);
        }

        $user->updateOrCreate(['lastname' => $user->lastname, 'firstname' => $user->firstname], ['image' => $image ]);

        return response()->json([
            'result' => 'Image uploaded'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
