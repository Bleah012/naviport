<x-app-layout>
    <x-slot name="header">
        <div class="header-container">
            <x-application-logo class="logo" />
            <h2 class="header-title">Manage Clients</h2>
        </div>
    </x-slot>

    <div class="content-container">
        <h3 class="section-title">Client Dashboard</h3>

        @if(auth()->user() && auth()->user()->hasRole('admin'))
            <div class="button-wrapper">
                <a href="{{ route('clients.create') }}" class="add-button">
                    + Add New Client
                </a>
            </div>
        @endif

        <form method="GET" action="{{ route('clients.index') }}" class="filter-form">
            <div class="filter-group">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="filter-input"
                       placeholder="Search by name or company">
                <button class="filter-button">Filter</button>
            </div>
        </form>

        <div class="table-wrapper">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->company }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->is_active ? 'Active' : 'Inactive' }}</td>
                            <td class="action-cell">
                                <a href="{{ route('clients.edit', $client->id) }}" class="edit-button">Edit</a>
                                <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-button" onclick="return confirm('Remove this client?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination-wrapper">
            {{ $clients->links() }}
        </div>
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
    max-width: 1100px;
    margin: 0 auto;
    padding: 48px 24px;
}

.section-title {
    font-size: 20px;
    font-weight: bold;
    color: #002147;
    margin-bottom: 16px;
}

/* Add Button */
.button-wrapper {
    text-align: right;
    margin-bottom: 24px;
}

.add-button {
    background-color: #28a745;
    color: white;
    font-weight: bold;
    padding: 10px 16px;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.add-button:hover {
    background-color: #218838;
}

/* Filter Form */
.filter-form {
    margin-bottom: 24px;
}

.filter-group {
    display: flex;
    gap: 12px;
}

.filter-input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
}

.filter-button {
    background-color: #007bff;
    color: white;
    padding: 10px 16px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.filter-button:hover {
    background-color: #0056b3;
}

/* Table */
.table-wrapper {
    overflow-x: auto;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.styled-table th,
.styled-table td {
    padding: 12px;
    border-top: 1px solid #ccc;
    text-align: left;
}

.styled-table thead {
    background-color: #002147;
    color: white;
    text-transform: uppercase;
    font-size: 14px;
}

/* Action Buttons */
.action-cell {
    display: flex;
    gap: 8px;
}

.edit-button {
    background-color: #ffc107;
    color: black;
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 14px;
}

.edit-button:hover {
    background-color: #e0a800;
}

.delete-button {
    background-color: #dc3545;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    border: none;
    font-size: 14px;
    cursor: pointer;
}

.delete-button:hover {
    background-color: #c82333;
}

/* Pagination */
.pagination-wrapper {
    margin-top: 24px;
}
</style>
