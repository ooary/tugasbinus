@extends('layouts.app')

@section('content')
    <h2>New Sale</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer">Customer</label>
            <select class="form-control" id="customer" name="customer_id">
                <option value="">Select a customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="product">Product</label>
            <select name="products" class="form-control" required>
                <option value="">Select a product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - Rp {{ number_format($product->sales_price, 0, ',', '.') }} - Stock {{$product->stock}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="qty" value="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Add to Sale</button>
    </form>
@endsection
