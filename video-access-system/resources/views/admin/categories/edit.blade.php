<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                            <x-text-input id="name" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="text" name="name" :value="old('name', $category->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-6">
                            <x-input-label for="description" :value="__('Description')" class="text-gray-700 font-medium" />
                            <textarea id="description" name="description" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50 shadow-sm" rows="4">{{ old('description', $category->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <x-primary-button class="ml-4 bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 rounded-xl px-6 py-2.5 shadow-lg shadow-blue-600/30">
                                {{ __('Update Category') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
