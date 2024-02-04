<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- ... -->
    <!-- Include Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#eae5d5] text-black font-sans antialiased">

    <!-- Header with BrandBoost, login, and register -->
    <header class="py-4 px-6 bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">BrandBoost.</h1>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-black hover:text-gray-700 mr-4">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-black hover:text-gray-700 mr-4">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-semibold text-black hover:text-gray-700">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <!-- Main content with centered headline -->
    <main class="container mx-auto text-center py-16">
        <h2 class="text-4xl font-bold mb-12">Craft your ideal promotion with us.</h2>

        <!-- Promotions Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 px-6">
            @foreach ($promotions as $promotion)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    @if ($promotion->image)
                        <img src="{{ Storage::url($promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold truncate">{{ $promotion->title }}</h3>
                        <p class="text-sm text-gray-500 overflow-hidden overflow-ellipsis whitespace-nowrap">{{ $promotion->description }}</p>
                        <div class="mt-4">
                            <span class="text-sm text-gray-600">Views: {{ $promotion->views }}</span>
                            <a href="{{ route('login') }}" class="text-blue-600 text-sm hover:text-blue-800 block mt-2">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>
</html>
