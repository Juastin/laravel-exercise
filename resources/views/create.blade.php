@extends('products')

@section('content')
    <form action="{{route('products.store')}}" name="create-product" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="info">Info</label>
            <input id="info" type="text" name="info" class="form-control" required="">
        </div>
        <input type="submit" name="send" class="btn btn-dark btn-block">
    </form>
@endsection
