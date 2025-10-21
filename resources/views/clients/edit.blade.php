<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Edit Client
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12 px-6">
        <form method="POST" action="{{ route('clients.update', $client->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-indigo-900">Client Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="company" class="block text-sm font-medium text-indigo-900">Company</label>
                    <input type="text" name="company" id="company" value="{{ old('company', $client->company) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-indigo-900">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-indigo-900">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $client->phone) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" {{ $client->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="text-sm text-indigo-900">Active</label>
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Update Client
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
