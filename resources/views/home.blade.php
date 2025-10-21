<x-app-layout>
    <x-slot name="header">
    <div class="bg-indigo-900 border-b border-black shadow-md px-6 py-6 rounded-b-xl">
        <h2 class="text-5xl font-black text-white uppercase tracking-wide">
            NAVIPORT ADMIN DASHBOARD
        </h2>
    </div>
</x-slot>


    <div class="max-w-7xl mx-auto py-12 px-6">
        <h3 class="text-2xl font-bold text-indigo-900 uppercase tracking-wide mb-8">
            Management Modules
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @php
                $modules = [
                    ['label' => 'Manage Ships', 'route' => 'ships.index', 'icon' => '🚢'],
                    ['label' => 'Manage Crews', 'route' => 'crews.index', 'icon' => '🧑‍✈️'],
                    ['label' => 'Manage Ports', 'route' => 'ports.index', 'icon' => '🏗️'],
                    ['label' => 'Manage Cargo', 'route' => 'cargos.index', 'icon' => '📦'],
                    ['label' => 'Manage Clients', 'route' => 'clients.index', 'icon' => '👥'],
                    ['label' => 'Manage Shipments', 'route' => 'shipments.index', 'icon' => '📤'],
                ];
            @endphp

            @foreach ($modules as $module)
                <a href="{{ route($module['route']) }}"
                   class="group block bg-white border border-indigo-300 rounded-xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1 hover:border-yellow-400 duration-200 p-6 text-left">
                    <div class="flex items-center space-x-4">
                        <div class="text-6xl text-yellow-400 group-hover:scale-110 transition">
                            {{ $module['icon'] }}
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-indigo-900 group-hover:text-indigo-800 uppercase tracking-wide">
                                {{ $module['label'] }}
                            </h3>
                            <p class="text-sm text-gray-600 group-hover:text-gray-800 mt-1">
                                Quick access to {{ strtolower(str_replace('Manage ', '', $module['label'])) }} records.
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
