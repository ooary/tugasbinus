@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Customer Details</h2>

                <div class="card">
                    <div class="card-header">
                        <h4>{{ $customer->name }}</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Email:</strong> {{ $customer->email }}</p>
                        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                        <p><strong>Address:</strong> {{ $customer->address }}</p>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(form) {
            if (confirm("Are you sure you want to delete this customer?")) {
                return true; // Submit the form
            }
            return false; // Prevent form submission
        }
    </script>
@endsection
