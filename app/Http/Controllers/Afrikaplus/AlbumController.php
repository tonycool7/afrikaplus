<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\Album;
use App\Afrika\Music;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featured = Album::all()->reverse()->take(4);
        $albums = Album::all();
        $songs = Music::inRandomOrder()->get();
        return view('album.index', compact('albums','songs', 'featured'));
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

    public function albumExists($title){
        if(!is_null(Album::where('title', $title)->first())){
            return true;
        }
        return false;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $albumData = $request->all();
        $name = $request->file('image_path')->getClientOriginalName();
        $albumData['image_path'] = $name;
        $error = "";

        if(!$this->albumExists($albumData['title'])){
            $request->image_path->storeAs('images', $name);
            Album::create($albumData);
        }else{
            $error = "Album already exists, enter a different album title or rename cover image";
        }

        return redirect()->back()->with(['error' => $error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        $songs = Album::find($id)->songs()->get();
        return view('album.show', compact('songs', 'album'));
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
        $album = Album::findOrFail($id);

        if(!Storage::delete('/images/'.$album->image_path)){
            return redirect('/afrika/admin')->with(['error' => 'Unable to delete album!']);
        }

        foreach ($album->songs as $item){
            if(!Storage::delete("/music/".$item->music_path)){
                return redirect('/afrika/admin')->with(['error' => 'Unable to delete music!']);
            }
        }

        $album->songs()->delete();
        Album::destroy($id);
        return redirect('/afrika/admin')->with(['success' => 'Album deleted!']);
    }
}
