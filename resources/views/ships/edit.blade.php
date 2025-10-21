<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Edit Ship
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12 px-6">
        <form method="POST" action="{{ route('ships.update', $ship->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-indigo-900">Ship Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $ship->name) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="ship_type" class="block text-sm font-medium text-indigo-900">Ship Type</label>
                    <input type="text" name="ship_type" id="ship_type" value="{{ old('ship_type', $ship->ship_type) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="capacity" class="block text-sm font-medium text-indigo-900">Capacity (tons)</label>
                    <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $ship->capacity) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" {{ $ship->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="text-sm text-indigo-900">Active</label>
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Update Ship
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
