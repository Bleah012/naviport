<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white uppercase tracking-wide">
                Edit Shipment
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto py-12 px-6">
        <form method="POST" action="{{ route('shipments.update', $shipment->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="reference" class="block text-sm font-medium text-indigo-900">Reference</label>
                    <input type="text" name="reference" id="reference" value="{{ old('reference', $shipment->reference) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <label for="ship_id" class="block text-sm font-medium text-indigo-900">Ship</label>
                    <select name="ship_id" id="ship_id"
                            class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                        @foreach ($ships as $ship)
                            <option value="{{ $ship->id }}" {{ $shipment->ship_id == $ship->id ? 'selected' : '' }}>
                                {{ $ship->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="client_id" class="block text-sm font-medium text-indigo-900">Client</label>
                    <select name="client_id" id="client_id"
                            class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $shipment->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="origin_port_id" class="block text-sm font-medium text-indigo-900">Origin Port</label>
                    <select name="origin_port_id" id="origin_port_id"
                            class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}" {{ $shipment->origin_port_id == $port->id ? 'selected' : '' }}>
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="destination_port_id" class="block text-sm font-medium text-indigo-900">Destination Port</label>
                    <select name="destination_port_id" id="destination_port_id"
                            class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                        @foreach ($ports as $port)
                            <option value="{{ $port->id }}" {{ $shipment->destination_port_id == $port->id ? 'selected' : '' }}>
                                {{ $port->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-indigo-900">Status</label>
                    <input type="text" name="status" id="status" value="{{ old('status', $shipment->status) }}"
                           class="mt-1 block w-full border border-indigo-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-yellow-400">
                </div>

                <div>
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Update Shipment
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
