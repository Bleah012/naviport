<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Edit Cargo
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12 px-6">
        <form method="POST" action="{{ route('cargos.update', $cargo->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-indigo-900">Cargo Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $cargo->name) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-indigo-900">Category</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $cargo->category) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="weight" class="block text-sm font-medium text-indigo-900">Weight (kg)</label>
                    <input type="number" name="weight" id="weight" value="{{ old('weight', $cargo->weight) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="client_id" class="block text-sm font-medium text-indigo-900">Client</label>
                    <select name="client_id" id="client_id"
                            class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $cargo->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" {{ $cargo->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="text-sm text-indigo-900">In Transit</label>
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Update Cargo
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
