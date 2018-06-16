<?php

namespace App\Http\Controllers\Afrikaplus;

use App\Afrika\Events;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserEventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('isVerified', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::all();

        $upcomingEvents = Events::where('end_date', '>', date('Y-m-d'))->get();

        $pastEvents = Events::where('end_date', '<', date('Y-m-d'))->get();

        return view('user_events.index', compact('events', 'upcomingEvents', 'pastEvents'));
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
        $requestData = $request->all();

        $requestData['start_date'] = $this->extractDate($request->start_date);
        $requestData['start_time'] = $this->extractTime($request->start_date);
        $requestData['end_date'] = $this->extractDate($request->end_date);
        $requestData['end_time'] = $this->extractTime($request->end_date);

        $eventid = Events::create($requestData);

        User::create([
                'firstname' => "event{$eventid->id}",
                'lastname' => "event{$eventid->id}",
                'username' => "event{$eventid->id}",
                'password' => "12345678",
                'phone' => $requestData['phone'],
                'email' => $requestData['email'],
                'country' => $requestData['country'],
                'city' => $requestData['city'],
             ]
        );

        return redirect("/user_events/".$eventid->id."/edit");
    }

    public function extractTime($date){
        return Carbon::createFromFormat('Y-m-d H:i', $date)->format('H:i');
    }

    public function extractDate($date){
        return Carbon::createFromFormat('Y-m-d H:i', $date)->format('Y-m-d');
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
        $event = Events::findOrFail($id);

        $eventProfile = User::where('username', 'event'.$event->id)->first();

        return view('user_events.edit', compact('event', 'eventProfile'));
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
        $event = Events::findOrFail($id);

        $requestData = $request->all();

        if($request->hasFile('image_path')){
            $image = $request->file('image_path')->getClientOriginalName();
            $request->avatar->storeAs('avatar', $image);
        }

        $requestData['organiser_id'] = \Auth::id();
        $requestData['start_date'] = $this->extractDate($request->start_date);
        $requestData['start_time'] = $this->extractTime($request->start_date);
        $requestData['end_date'] = $this->extractDate($request->end_date);
        $requestData['end_time'] = $this->extractTime($request->end_date);

        $event->update($requestData);

        User::where('username', 'event'.$id)->first()->update(
            [
                'image' => $requestData['image_path'],
                'status' => $requestData['description'],
                'phone' => $requestData['phone'],
                'email' => $requestData['email'],
                'country' => $requestData['country'],
                'city' => $requestData['city'],
            ]
        );

        return redirect('/profile/event'.$id);
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
