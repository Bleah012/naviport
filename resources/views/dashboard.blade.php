<x-app-layout>
    <x-slot name="header">
        <div class="bg-[#002147] px-6 py-6 border-b border-black shadow-md rounded-b-xl flex items-center space-x-3">
            <x-application-logo class="h-8 w-auto fill-current text-yellow-400" />
            <h2 class="text-4xl font-black text-white leading-tight tracking-tight uppercase">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-indigo-300 hover:border-yellow-400 shadow-md hover:shadow-xl sm:rounded-xl transition duration-200">
                <div class="p-6 text-indigo-800 text-lg font-semibold flex items-center space-x-3">
                    <svg class="h-6 w-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a7 7 0 100 14A7 7 0 009 2zM8 10h2v2H8v-2zm0-6h2v4H8V4z"/>
                    </svg>
                    <span>{{ __("You're logged in!") }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
