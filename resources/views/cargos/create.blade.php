@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Register New Cargo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('cargos.store') }}">
        @csrf

        <div class="mb-3">
            <label for="description" class="form-label">Description *</label>
            <input type="text" name="description" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Weight (kg) *</label>
            <input type="number" name="weight" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="volume" class="form-label">Volume (m³)</label>
            <input type="number" name="volume" step="0.01" class="form-control">
        </div>

        <div class="mb-3">
            <label for="cargo_type" class="form-label">Cargo Type</label>
            <input type="text" name="cargo_type" class="form-control">
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

        <button type="submit" class="btn btn-primary">Register Cargo</button>
        <a href="{{ route('cargos.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
