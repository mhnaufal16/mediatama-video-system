<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-2">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">You are logged in as <span class="font-semibold text-blue-600">{{ Auth::user()->role === 'admin' ? 'Administrator' : 'Customer' }}</span>.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
