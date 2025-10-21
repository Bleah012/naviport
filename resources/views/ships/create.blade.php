@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Ship</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('ships.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Ship Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="registration_number" class="form-label">Registration Number *</label>
            <input type="text" name="registration_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity (tons) *</label>
            <input type="number" name="capacity" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ship_type" class="form-label">Ship Type</label>
            <select name="ship_type" class="form-select">
                <option value="">Select Type</option>
                <option value="cargo">Cargo</option>
                <option value="passenger">Passenger</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">Select Status</option>
                <option value="active">Active</option>
                <option value="under maintenance">Under Maintenance</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Ship</button>
        <a href="{{ route('ships.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
