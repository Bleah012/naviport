@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Client</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('clients.store') }}">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name *</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name *</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Client</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
