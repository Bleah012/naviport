@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Client Dashboard</h2>

    <!--  Search Form -->
    <form method="GET" action="{{ route('clients.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name or email">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!--  Client Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>{{ $client->company_name ?? '—' }}</td>
                    <td>{{ $client->is_active ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--  Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $clients->links() }}
    </div>
</div>
@endsection
