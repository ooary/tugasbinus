@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2>Dashboard</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Revenue</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp. {{ number_format($totalRevenue, 2) }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Costs</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp. {{ number_format($totalCosts, 2) }}</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Net Profit</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp. {{ number_format($netProfit, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
