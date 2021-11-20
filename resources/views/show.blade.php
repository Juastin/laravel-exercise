@extends('products')

@section('content')
    <div class="p-6 bg-white border-b border-gray-200">
        <div style="display: inline-block" class="p-6">
            <p>Id:</p>
            <p>Name:</p>
            <p>Information:</p>
        </div>
        <div style="display: inline-block" class="p-6">
            <p>{{$product->id}}.</p>
            <p>{{$product->name}}</p>
            <p>{{$product->info}}</p>
        </div>
    </div>
    <div class="p-6">
        <button style="display: inline-block" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                onclick="window.location='{{ route('products.edit', $product) }}'">Edit
        </button>
        <form style="display: inline-block" action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
    </div>
@endsection
