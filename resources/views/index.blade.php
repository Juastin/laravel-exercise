@extends('products')

@section('content')
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="window.location='{{ route("products.create") }}'">Create a product</button>
    @foreach($products as $product)
        <div style="cursor: pointer" class="p-6 bg-white border-b border-gray-200" onclick="window.location='{{route("products.show", $product) }}'">
            <p>{{$product->id}}.</p>
            <p>{{$product->name}}</p>
            <p>{{$product->info}}</p>
        </div>
    @endforeach

@endsection
