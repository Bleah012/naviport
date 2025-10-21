<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Edit Crew Member
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12 px-6">
        <form method="POST" action="{{ route('crews.update', $crew->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-indigo-900">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $crew->name) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="role" class="block text-sm font-medium text-indigo-900">Role</label>
                    <input type="text" name="role" id="role" value="{{ old('role', $crew->role) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" {{ $crew->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="text-sm text-indigo-900">Active</label>
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Update Crew Member
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
