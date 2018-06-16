<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\Music;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $music = Music::all();

        return view('music.index', compact('music'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
    }

    public function musicExists($title, $music){
        if(!is_null(Music::where('title', $title)->first())){
            return true;
        }

        if(!is_null(Music::where('image_path', $music)->first())){
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
        if($request->hasFile('image')){
            $image = $request->file('image')->getClientOriginalName();
            $albumData['image_path'] = $image;
            $request->image->storeAs('images', $image);
        }

        $music = $request->file('src')->getClientOriginalName();
        $albumData['music_path'] = $music;
        $albumData['length'] = "00:00";
        $error = "";

        if(!$this->musicExists($albumData['title'], $music)){
            $request->src->storeAs('music', $music);
            Music::create($albumData);
        }else{
            $error = "Music already exists, enter a different music title or rename src file";
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

    public function searchMusic(Request $request){
        $music = Music::where('title', 'LIKE', '%'.$request->search_word.'%')->orWhere('artist', 'LIKE', '%'.$request->search_word.'%')->orWhere('music_path', 'LIKE', '%'.$request->search_word.'%')->get();

        return view('music.index', compact('music'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        if($music->image_path != null){
            if(!Storage::delete("/images/".$music->image_path)){
                return redirect('/afrika/admin')->with(['error' => 'Unable to delete music!']);
            }
        }
        if(!Storage::delete("/music/".$music->music_path)){
            return redirect('/afrika/admin')->with(['error' => 'Unable to delete music!']);
        }
        Music::destroy($id);
        return redirect('/afrika/admin')->with(['success' => 'Music deleted!']);
    }
}
