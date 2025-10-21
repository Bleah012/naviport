<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Manage Cargo
            </h2>
        </div>
    </x-slot>

    @role('admin')
    <p class="text-green-600 font-bold">✅ You are logged in as an admin.</p>
@else
    <p class="text-red-600 font-bold">🚫 You are NOT an admin.</p>
@endrole

    <div class="max-w-7xl mx-auto py-12 px-6">
        <h3 class="text-xl font-bold text-indigo-900 mb-4">Cargo Dashboard</h3>

        {{-- Temporarily removed @role check --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('cargos.create') }}"
               class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition">
                + Add New Cargo
            </a>
        </div>

        <form method="GET" action="{{ route('cargos.index') }}" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="flex-1 border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400"
                       placeholder="Search by name or category">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-indigo-300 rounded shadow">
                <thead class="bg-[#002147] text-white uppercase text-sm">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Weight</th>
                        <th class="px-4 py-2">Client</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cargos as $cargo)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $cargo->id }}</td>
                            <td class="px-4 py-2">{{ $cargo->name }}</td>
                            <td class="px-4 py-2">{{ $cargo->category }}</td>
                            <td class="px-4 py-2">{{ $cargo->weight }} kg</td>
                            <td class="px-4 py-2">{{ $cargo->client->name ?? '—' }}</td>
                            <td class="px-4 py-2">{{ $cargo->is_active ? 'In Transit' : 'Delivered' }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('cargos.edit', $cargo->id) }}"
                                   class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 text-sm">Edit</a>
                                <form method="POST" action="{{ route('cargos.destroy', $cargo->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm"
                                            onclick="return confirm('Remove this cargo item?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $cargos->links() }}
        </div>
    </div>
</x-app-layout>
