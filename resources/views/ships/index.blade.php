@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Ship Dashboard</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('ships.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or type">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!-- Ship Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Capacity (tons)</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ships as $ship)
                <tr>
                    <td>{{ $ship->id }}</td>
                    <td>{{ $ship->name }}</td>
                    <td>{{ $ship->ship_type }}</td>
                    <td>{{ $ship->capacity }}</td>
                    <td>{{ $ship->is_active ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $ships->links() }}
    </div>
</div>
@endsection
