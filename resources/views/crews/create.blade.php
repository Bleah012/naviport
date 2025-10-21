@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Crew Member</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('crews.store') }}">
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
            <label for="role" class="form-label">Role *</label>
            <input type="text" name="role" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number *</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" name="nationality" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Crew Member</button>
        <a href="{{ route('crews.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
