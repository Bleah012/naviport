@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Cargo Dashboard</h2>

    <!-- 🔍 Search Form -->
    <form method="GET" action="{{ route('cargos.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by description or type">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    <!-- 📦 Cargo Cards -->
    <div class="row">
        @foreach ($cargos as $cargo)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cargo->description }}</h5>
                        <p class="card-text">
                            Type: {{ $cargo->cargo_type }}<br>
                            Weight: {{ $cargo->weight }} kg<br>
                            Volume: {{ $cargo->volume }} m³<br>
                            Client: {{ $cargo->client->first_name ?? '—' }} {{ $cargo->client->last_name ?? '' }}<br>
                            Status: {{ $cargo->is_active ? 'Active' : 'Inactive' }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--  Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $cargos->links() }}
    </div>
</div>
@endsection
