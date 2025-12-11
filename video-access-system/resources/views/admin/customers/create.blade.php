<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.customers.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                            <x-text-input id="name" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="text" name="name" :value="old('name')" required autofocus placeholder="Enter customer name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-6">
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                            <x-text-input id="email" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="email" name="email" :value="old('email')" required placeholder="Enter customer email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-6">
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                            <x-text-input id="password" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="password" name="password" required placeholder="Enter password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-6">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="password" name="password_confirmation" required placeholder="Confirm password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <x-primary-button class="ml-4 bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 rounded-xl px-6 py-2.5 shadow-lg shadow-blue-600/30">
                                {{ __('Create Customer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
