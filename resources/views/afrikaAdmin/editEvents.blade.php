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
            <form class="form form-vertical" action="/events/{{$event->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                @include('afrikaAdmin.eventsForm')
            </form>

        </div>
    </div>
@endsection