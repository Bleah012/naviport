@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Shipment Dashboard</h2>

    <!--  Search Form -->
    <form method="GET" action="{{ route('shipments.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by status or date">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!-- Shipment Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cargo</th>
                <th>Ship</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Status</th>
                <th>Delay Reason</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->id }}</td>
                    <td>{{ $shipment->cargo->description ?? '—' }}</td>
                    <td>{{ $shipment->ship->name ?? '—' }}</td>
                    <td>{{ $shipment->originPort->name ?? '—' }}</td>
                    <td>{{ $shipment->destinationPort->name ?? '—' }}</td>
                    <td>{{ $shipment->departure_date }}</td>
                    <td>{{ $shipment->arrival_date ?? '—' }}</td>
                    <td>{{ ucfirst($shipment->status) }}</td>
                    <td>{{ $shipment->delay_reason ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--  Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $shipments->links() }}
    </div>
</div>
@endsection
