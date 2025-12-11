<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Watching: ') . $video->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="aspect-w-16 aspect-h-9 mb-6">
                        <iframe src="{{ str_replace('watch?v=', 'embed/', $video->url) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-96"></iframe>
                    </div>
                    <h3 class="text-2xl font-bold mb-2">{{ $video->title }}</h3>
                    <p class="text-gray-700">{{ $video->description }}</p>
                    <div class="mt-4">
                        <a href="{{ route('videos.index') }}" class="text-blue-600 hover:underline">&larr; Back to Videos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
