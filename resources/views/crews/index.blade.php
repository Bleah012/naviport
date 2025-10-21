<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Manage Crews
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 px-6">
        <h3 class="text-xl font-bold text-indigo-900 mb-4">Crew Dashboard</h3>

        <a href="{{ route('crews.create') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-6">
            + Add New Crew
        </a>

        <form method="GET" action="{{ route('crews.index') }}" class="mb-6">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}"
                       class="flex-1 border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400"
                       placeholder="Search by name or role">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-indigo-300 rounded shadow">
                <thead class="bg-[#002147] text-white uppercase text-sm">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($crews as $crew)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $crew->id }}</td>
                            <td class="px-4 py-2">{{ $crew->name }}</td>
                            <td class="px-4 py-2">{{ $crew->role }}</td>
                            <td class="px-4 py-2">{{ $crew->is_active ? 'Active' : 'Inactive' }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('crews.edit', $crew->id) }}" class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 text-sm">Edit</a>
                                <form method="POST" action="{{ route('crews.destroy', $crew->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm"
                                            onclick="return confirm('Remove this crew member?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $crews->links() }}
        </div>
    </div>
</x-app-layout>
