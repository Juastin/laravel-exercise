@extends('products')

@section('content')
    @foreach($products as $product)
        <div class="p-6 bg-white border-b border-gray-200">
            <p>{{$product->name}}</p>
            <p>{{$product->info}}</p>
        </div>
    @endforeach
@endsection
