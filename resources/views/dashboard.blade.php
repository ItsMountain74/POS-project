@extends('temp.header')
@section('title')
Sanhook Dashboard
@endsection
@include('temp.adminNav')
@if(session('msg'))
    <div class="alert alert-dismissible alert-secondary">
        <strong>{{ session('msg') }}</strong>
    </div>
@endif
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
Welcome To Sanhook Cafe
</h2>
@include('temp.footer')
