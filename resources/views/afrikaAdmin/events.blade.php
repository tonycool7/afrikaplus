@extends('layouts.admin')

@section('content')
    @if(\Session::get('error'))
        <div class="alert alert-danger alert-box alert-close">{{\Session::get('error')}}</div>
    @endif
    @if(\Session::get('success'))
        <div class="alert alert-success alert-box alert-close">{{\Session::get('success')}}</div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">Events panel</div>
        <div class="panel-body">
            <form class="form form-vertical" action="/events" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('afrikaAdmin.eventsForm')
            </form>

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">list of Events</div>
        <div class="panel-body">
            <table class="table table-bordered table-responsive table-hover">
                <thead>
                    <th>Title</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($events as $item)
                        <tr>
                            <td><a href="/events/{{$item->id}}/edit">{{$item->title}}</a></td>
                            <td>{{$item->country}}</td>
                            <td>{{$item->city}}</td>
                            <td>{{$item->venue}}</td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>{{$item->start_time}}</td>
                            <td>{{$item->end_time}}</td>
                            <td>
                                <form action="/events/{{$item->id}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                {!! csrf_field() !!}
                                <button><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection