@extends('temp.header')
@section('title')
    Place Order
@endsection
@include('temp.adminNav')

<h2>Create New Order</h2>

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
        <th scope="col">Quantity</th>
    </tr>
    </thead>
    <tbody>
    @php
        $i = 1;
    @endphp
        <form action="{{url('/newOrder/store')}}" class="position-sticky" method="post">
            @foreach($products as $prod)
            @csrf
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>
                        {{$prod->name}}
                    </td>
                    <td>
                        {{$prod->price}}
                    </td>
                    <td>
                        {{$prod->qnt}}
                    </td>
                    <td>
                        @if($prod->qnt)
                            <input type="text" name = "{{$prod->name}}qnt" value="0">
                        @else
                            <input type="text" name = "{{$prod->name}}qnt" value="0" disabled="">
                        @endif

                    </td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
                <button type="submit" class="btn btn-outline-light float-end " >Place Order</button>
        </form>
    </tbody>

</table>

@include('temp.footer')
