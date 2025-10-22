<x-app-layout>
    <x-slot name="header">
        <div class="header-container">
            <x-application-logo class="logo" />
            <h2 class="header-title">Edit Client</h2>
        </div>
    </x-slot>

    <div class="content-container">
        <h3 class="section-title">Client Details</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('clients.update', $client->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Full Name *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Company *</label>
                <input type="text" name="company" id="company" value="{{ old('company', $client->company) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number *</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" class="form-control" required>
            </div>

            <div class="mb-3 checkbox-group">
                <input type="checkbox" name="is_active" id="is_active" {{ $client->is_active ? 'checked' : '' }}>
                <label for="is_active">Active</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Update Client</button>
                <a href="{{ route('clients.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>

<style>
/* Layout */
.header-container {
    display: flex;
    align-items: center;
    gap: 12px;
}

.logo {
    height: 32px;
    width: auto;
    fill: #FFD700;
}

.header-title {
    font-size: 32px;
    font-weight: 900;
    color: white;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.content-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 48px 24px;
}

.section-title {
    font-size: 20px;
    font-weight: bold;
    color: #002147;
    margin-bottom: 24px;
}

/* Form */
.mb-3 {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-weight: bold;
    margin-bottom: 6px;
    color: #333;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
}

.checkbox-group {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 20px;
}

.checkbox-group label {
    font-size: 16px;
    color: #333;
}

/* Buttons */
.form-actions {
    margin-top: 32px;
}

.btn-submit {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-submit:hover {
    background-color: #0056b3;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.btn-cancel {
    background-color: #6c757d;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 6px;
    font-size: 16px;
    text-decoration: none;
    margin-left: 12px;
    transition: background-color 0.3s ease;
}

.btn-cancel:hover {
    background-color: #5a6268;
}
</style>
