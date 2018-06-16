<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\Events;
use App\Afrika\Music;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Music::inRandomOrder()->get();
        $events = Events::all();
        return view('events.index', compact('songs', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Events::all();
        return view('afrikaAdmin.events', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventsData = $request->all();

        if($request->hasFile('image_path')){
            $image = $request->file('image_path')->getClientOriginalName();
            $eventsData['image_path'] = $image;
            $request->image_path->storeAs('avatar', $image);
        }else{
            return redirect()->back()->with(['error' => 'Error uploading image']);
        }

        Events::create($eventsData);

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $songs = Music::inRandomOrder()->get();
        $event = Events::findOrFail($id);
        $user = User::where('username', 'event'.$id)->first();

        $posts = $user->posts;

        return view('events.show', compact('event', 'songs', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::findOrFail($id);

        return view('afrikaAdmin.editEvents', compact('event'));
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
        $eventsData = $request->all();

        $event = Events::findOrFail($id);

        if($request->hasFile('image_path')){
            $image = $request->file('image_path')->getClientOriginalName();
            $eventsData['image_path'] = $image;
            $request->image_path->storeAs('avatar', $image);
        }

        $event->update($eventsData);

        return redirect('/events')->with(['success' => 'event updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Events::findOrFail($id);
        if(!Storage::delete("/avatar/".$event->image_path)){
            return redirect()->back()->with(['error' => 'Unable to delete event!']);
        }
        Events::destroy($id);
        return redirect()->back()->with(['success' => 'Event deleted!']);
    }
}
