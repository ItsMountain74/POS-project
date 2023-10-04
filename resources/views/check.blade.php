@extends('temp.header')
@section('title')
    Check In&Out
@endsection
@include('temp.adminNav')

<h2>Name: {{$user->name}}</h2>


<form action="{{url('/checkIn/'.$user->id)}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <button type="submit" class="btn btn-outline-success">Check in</button>
</form>

<form action="{{url('/checkOut/'.$user->id)}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$user->id}}">
    <button type="submit" class="btn btn-outline-danger">Check Out</button>
</form>


