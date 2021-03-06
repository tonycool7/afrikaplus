<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\Posts;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postData = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $postData['image'] = $image;
            $request->image->storeAs('posts', $image);
        }else{
            return response()->json([
               'result' => 'Image unable to upload'
            ]);
        }

        Posts::create($postData);

        return response()->json([
            'result' => 'Image uploaded'
        ]);
    }

    public function fetchCommentOwner($comments){
        $result = [];
        foreach ($comments as $item){
            array_push($result, array_merge(User::find($item->user_id)->toArray(),$item->toArray()));
        }
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::findOrFail($id);

        return response()->json(
            [
                'post' => $post,
                'likes' => count($post->likes),
                'comments' => $this->fetchCommentOwner($post->comments)
            ]
        );
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
