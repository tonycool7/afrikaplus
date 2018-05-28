<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\Likes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function likeExists($request){
        return Likes::where("post_id", $request->post_id)->Where("user_id", $request->user_id)->first() != null ? true : false;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $likeData = $request->all();

        if(!$this->likeExists($request)){
            $like = Likes::create($likeData);
        }else{
            Likes::where("post_id", $request->post_id)->Where("user_id", $request->user_id)->delete();
        }

        $likes = Likes::where("post_id", $request->post_id)->get();
        return response()->json([
            'likes' => count($likes),
            'success' => 'like added'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $likes = Likes::where("post_id", $id)->get();

        return response()->json([
            'total' => count($likes),
            'success' => 'ok'
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
