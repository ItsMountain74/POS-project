@extends('temp.header')
@section('title')
    Show Orders
@endsection
@auth
    @include('temp.adminNav')
@else
    @include('temp.unAuth')
@endauth

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Products</th>
        <th scope="col">Quantities</th>
        <th scope="col">Total Price</th>
        <th scope="col">Print</th>
    </tr>
    </thead>
    <tbody>
    @php
        $i = 1;
        $total = 0;
    @endphp
    @foreach($orders as $order)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>
                {{$order->products}}
            </td>
            <td>
                {{$order->qnt}}
            </td>
            <td>
                {{$order->total_price}}
            </td>
            <td>
                <form action="{{url('order/print')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value ="{{$order->id}}">
                    <button type="submit" class="btn btn-outline-warning">Print</button>
                </form>
            </td>
        </tr>
        @php
            $total+=$order->total_price;
            $i++;
        @endphp
    @endforeach
    <tr>
        <td>Total :</td>
        <td></td>
        <td></td>
        <td>
            {{$total}}
        </td>
    </tr>
    </tbody>
</table>
@include('temp.footer')
