@extends('layouts.app')

@section('content')
    <h2>Add Product</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price (Rp)</label>
            <input type="number" name="price" class="form-control" id="price" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" id="stock" required>
        </div>
        <div class="form-group">
            <label for="margin">Margin (%)</label>
            <input type="number" name="margin" class="form-control" id="margin" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection
