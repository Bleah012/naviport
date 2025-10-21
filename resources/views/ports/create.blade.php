@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Port</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('ports.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Port Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="country" class="form-label">Country *</label>
            <input type="text" name="country" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude *</label>
            <input type="number" name="latitude" step="0.000001" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude *</label>
            <input type="number" name="longitude" step="0.000001" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="docking_capacity" class="form-label">Docking Capacity</label>
            <input type="number" name="docking_capacity" class="form-control">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="customs_authorized" value="1" class="form-check-input" id="customsCheck">
            <label class="form-check-label" for="customsCheck">Customs Authorized</label>
        </div>

        <button type="submit" class="btn btn-primary">Add Port</button>
        <a href="{{ route('ports.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
