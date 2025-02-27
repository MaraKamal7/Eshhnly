@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h2 class="mb-3">Ship Details</h2>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $ship->id }}</td>
            </tr>
            <tr>
                <th>Note</th>
                <td>{{ $ship->note }}</td>
            </tr>
            <tr>
                <th>From</th>
                <td>{{ $ship->From }}</td>
            </tr>
            <tr>
                <th>To</th>
                <td>{{ $ship->To }}</td>
            </tr>
            <tr>
                <th>Weight</th>
                <td>{{ $ship->weight }} kg</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $ship->quantity }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($ship->status) }}</td>
            </tr>
            <tr>
                <th>Created By</th>
                <td>{{ $ship->created_by }}</td>
            </tr>
            <tr>
                <th>Trip ID</th>
                <td>{{ $ship->trip_id }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $ship->created_at ? $ship->created_at->format('Y-m-d H:i') : 'N/A' }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $ship->updated_at ? $ship->updated_at->format('Y-m-d H:i') : 'N/A' }}</td>
                </tr>
        </table>

        <a href="{{ route('ships.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
</div>
@endsection
