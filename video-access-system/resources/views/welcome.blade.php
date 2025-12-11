<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Mediatama Video') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="antialiased bg-white text-slate-800">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">M</div>
                    <span class="font-bold text-xl text-gray-900">Mediatama</span>
                </a>

                <!-- Right Actions -->
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600">Log In</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Upgrade Your Skills
            </h1>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Pelajari skill baru dengan materi berkualitas dan akses selamanya.
            </p>
        </div>

        <!-- Course Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($videos as $video)
                <div class="bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <!-- Thumbnail -->
                    <div class="h-48 bg-gray-200 relative">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($video->title) }}&background=random&size=400" alt="{{ $video->title }}" class="w-full h-full object-cover">
                        <div class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-gray-700">
                            {{ $video->category->name ?? 'General' }}
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="font-bold text-gray-900 text-lg mb-2 line-clamp-2">
                            {{ $video->title }}
                        </h3>
                        <p class="text-gray-500 text-sm line-clamp-2 mb-4">
                            {{ $video->description }}
                        </p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-blue-600 font-bold">Premium</span>
                            <div class="flex items-center gap-1 text-yellow-400 text-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <span class="text-gray-600 font-medium">4.8</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Belum ada kelas yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Mediatama Video System. All rights reserved.
        </div>
    </footer>

</body>
</html>
