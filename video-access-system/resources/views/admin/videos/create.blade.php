<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.videos.store') }}">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" class="text-gray-700 font-medium" />
                            <x-text-input id="title" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="text" name="title" :value="old('title')" required autofocus placeholder="Enter video title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- URL -->
                        <div class="mt-6">
                            <x-input-label for="url" :value="__('Video URL')" class="text-gray-700 font-medium" />
                            <x-text-input id="url" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50" type="url" name="url" :value="old('url')" required placeholder="https://youtube.com/..." />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div class="mt-6">
                            <x-input-label for="category_id" :value="__('Category')" class="text-gray-700 font-medium" />
                            <select id="category_id" name="category_id" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50 shadow-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-6">
                            <x-input-label for="description" :value="__('Description')" class="text-gray-700 font-medium" />
                            <textarea id="description" name="description" class="block mt-1 w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring-blue-500 bg-gray-50/50 shadow-sm" rows="4" placeholder="Enter video description">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <x-primary-button class="ml-4 bg-blue-600 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 rounded-xl px-6 py-2.5 shadow-lg shadow-blue-600/30">
                                {{ __('Create Video') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
