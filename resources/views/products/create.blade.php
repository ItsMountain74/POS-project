@extends('temp.header')
@section('title')
    Add Product
@endsection
@include('temp.adminNav')
<form action="{{  route('products.store')  }}" method="post">
    @csrf
        <div class="form-group">
            <label for="name">Product name</label>
            <input type="text" name= "name" class="form-control" placeholder="Enter Product name" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Quantity</label>
            <input type="text" class="form-control" name="qnt" placeholder="Enter the quantity" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Enter the Price" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

@include('temp.footer')
