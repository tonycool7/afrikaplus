<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\UserPlaylist;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authUser = \Auth::user();
        $authorized = ($authUser != null) ? true : false;

        $playlist = ($authUser != null && $authUser->playlist->where('title', 'default')->first() != null) ? $authUser->playlist->where('title', 'default')->first()->music : [];

        $user = [
            'authUser' => $authUser ?? null,
            'authorized' => $authorized,
            'userDetails' => ($authUser) ? $authUser->toArray() : ""
        ];

        return view('playlist.show', compact('user', 'playlist'));
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
        if(\Auth::user() == null){
            return response()->json(
                [
                    'result' => "You have to login to add music"
                ]
            );
        }
        UserPlaylist::create([
            'music_id' => $request->music_id,
            'playlist_id' => \Auth::user()->playlist->where('title', 'default')->first()->id
        ]);

        return response()->json(
            [
                'result' => "Music added to default playlist"
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
