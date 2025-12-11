<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Videos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($videos as $video)
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden flex flex-col h-full">
                                <div class="p-6 flex-grow">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $video->category->name }}
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-1">{{ $video->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $video->description }}</p>
                                </div>
                                
                                <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 mt-auto">
                                    @php
                                        $request = $video->accessRequests->first();
                                    @endphp

                                    @if ($request && $request->status === 'approved' && $request->access_end_time > now())
                                        <div class="flex flex-col space-y-2">
                                            <a href="{{ route('videos.watch', $video) }}" class="w-full inline-flex justify-center items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Watch Now
                                            </a>
                                            <span class="text-xs text-center text-green-600 font-medium">
                                                Expires {{ $request->access_end_time->diffForHumans() }}
                                            </span>
                                        </div>
                                    @elseif ($request && $request->status === 'pending')
                                        <button disabled class="w-full inline-flex justify-center items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest cursor-not-allowed opacity-75">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            Request Pending
                                        </button>
                                    @else
                                        <form action="{{ route('videos.request', $video) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Request Access
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
