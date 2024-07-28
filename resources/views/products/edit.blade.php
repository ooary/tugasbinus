@extends('layouts.app')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price (Rp)</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" value="{{ $product->stock }}" required>
        </div>
        <div class="form-group">
            <label for="margin">Margin (%)</label>
            <input type="number" name="margin" class="form-control" id="margin" value="{{ $product->margin }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
