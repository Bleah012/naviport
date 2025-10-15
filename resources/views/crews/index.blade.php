@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Crew Dashboard</h2>

    <!--  Search Form -->
    <form method="GET" action="{{ route('crews.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or role">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!--  Crew Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Nationality</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crews as $crew)
                <tr>
                    <td>{{ $crew->id }}</td>
                    <td>{{ $crew->first_name }} {{ $crew->last_name }}</td>
                    <td>{{ $crew->role }}</td>
                    <td>{{ $crew->phone_number }}</td>
                    <td>{{ $crew->nationality ?? '—' }}</td>
                    <td>{{ $crew->is_active ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--  Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $crews->links() }}
    </div>
</div>
@endsection
