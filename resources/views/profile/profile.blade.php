@extends('layouts.profile')

@section('content')
    <Profile :csrf="{{json_encode(csrf_token())}}" :user="{{json_encode($user)}}"></Profile>
@endsection