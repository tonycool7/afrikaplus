@extends('layouts.profile')

@section('title')
    {!! $user['authUser']->firstname !!}
@endsection

@section('styling')
    <link href="{{mix('/css/profile.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <Profile :csrf="{{json_encode(csrf_token())}}" :user="{{json_encode($user)}}"></Profile>
@endsection