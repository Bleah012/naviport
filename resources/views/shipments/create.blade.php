@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Register New Shipment</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('shipments.store') }}">
        @csrf

        <div class="mb-3">
            <label for="ship_id" class="form-label">Ship *</label>
            <select name="ship_id" class="form-select" required>
                <option value="">Select Ship</option>
                @foreach ($ships as $ship)
                    <option value="{{ $ship->id }}">{{ $ship->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="client_id" class="form-label">Client *</label>
            <select name="client_id" class="form-select" required>
                <option value="">Select Client</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="origin_port_id" class="form-label">Origin Port *</label>
            <select name="origin_port_id" class="form-select" required>
                <option value="">Select Origin</option>
                @foreach ($ports as $port)
                    <option value="{{ $port->id }}">{{ $port->name }} ({{ $port->country }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="destination_port_id" class="form-label">Destination Port *</label>
            <select name="destination_port_id" class="form-select" required>
                <option value="">Select Destination</option>
                @foreach ($ports as $port)
                    <option value="{{ $port->id }}">{{ $port->name }} ({{ $port->country }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="departure_date" class="form-label">Departure Date *</label>
            <input type="date" name="departure_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="arrival_date" class="form-label">Arrival Date</label>
            <input type="date" name="arrival_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cargo_description" class="form-label">Cargo Description *</label>
            <input type="text" name="cargo_description" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status *</label>
            <select name="status" class="form-select" required>
                <option value="scheduled">Scheduled</option>
                <option value="in transit">In Transit</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Shipment</button>
        <a href="{{ route('shipments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
