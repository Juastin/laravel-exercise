@extends('products')

@section('content')
    <form action="{{route('products.update', $product)}}" name="create-product" method="POST">
        @csrf
        @method('PUT')
        <input name="product" type="hidden" value="{{$product->id}}">
        <div class="p-6 bg-white border-b border-gray-200">
            <label for="name">Name</label><br>
            <input id="name" type="text" name="name" value="{{$product->name}}" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Name" required="">
        </div>
        <div class="p-6 bg-white border-b border-gray-200">
            <label for="info">Information</label><br>
            <input id="info" type="text" name="info" value="{{$product->info}}" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Information" required="">
        </div>
        <input type="submit" name="send" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    </form>
@endsection
