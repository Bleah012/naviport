<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Manage Ports
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 px-6">
        <h3 class="text-xl font-bold text-indigo-900 mb-4">Port Dashboard</h3>

        <a href="{{ route('ports.create') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-6">
            + Add New Port
        </a>

        <form method="GET" action="{{ route('ports.index') }}" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="flex-1 border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400"
                       placeholder="Search by name or location">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-indigo-300 rounded shadow">
                <thead class="bg-[#002147] text-white uppercase text-sm">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Capacity</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ports as $port)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $port->id }}</td>
                            <td class="px-4 py-2">{{ $port->name }}</td>
                            <td class="px-4 py-2">{{ $port->location }}</td>
                            <td class="px-4 py-2">{{ $port->capacity }}</td>
                            <td class="px-4 py-2">{{ $port->is_active ? 'Operational' : 'Inactive' }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('ports.edit', $port->id) }}" class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 text-sm">Edit</a>
                                <form method="POST" action="{{ route('ports.destroy', $port->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm"
                                            onclick="return confirm('Deactivate this port?')">Deactivate</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $ports->links() }}
        </div>
    </div>
</x-app-layout>
