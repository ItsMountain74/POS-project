@extends('temp.header')
@section('title')
    Products
@endsection
@auth
@include('temp.adminNav')
@else
@include('temp.unAuth')
@endauth

@if(session('msg'))
<div class="alert alert-dismissible alert-secondary">
    <strong>{{ session('msg') }}</strong>
</div>

@endif
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Price</th>
        <th scope="col">Available</th>
        @auth
            <th scope="col">Add More</th>
            <th scope="col">Submit</th>
        @endauth
    </tr>
    </thead>
    <tbody>
    @php
    $i = 1;
    @endphp
    @foreach($products as $prod)
    <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$prod->name}}</td>
        <td>{{$prod->price}}</td>
        <td>
            @if($prod->qnt >= 10)
                {{'Available'}}
            @elseif($prod->qnt < 10 && $prod->qnt > 0)
                {{'Available Only '.$prod->qnt}}
            @else
                {{'Not Available'}}
            @endif
        </td>
        @auth
            <form action="{{route('products.update',$prod->id)}}" method="post">
                @csrf
                @method('PUT')
                <td>
                    <input type="text" name="newQnt" placeholder="Enter the new Quantity">
                </td>
                <td>
                    <button type="submit" class="btn btn-outline-success" value="Update">Add</button>
                </td>

            </form>
        @endauth
    </tr>
        @php
        $i++;
        @endphp
    @endforeach
    </tbody>
</table>
@include('temp.footer')
