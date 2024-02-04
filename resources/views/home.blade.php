@extends('layouts.app')

@section('content')
<div class="bg-[#eae5d5] min-h-screen">
    <div class="container mx-auto px-6 py-4">

        
        <!-- Promotions Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($promotions as $promotion)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    @if ($promotion->image)
                        <img src="{{ Storage::url($promotion->image) }}" alt="{{ $promotion->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold truncate">{{ $promotion->title }}</h3>
                        <p class="text-sm text-gray-500 overflow-hidden overflow-ellipsis whitespace-nowrap">{{ $promotion->description }}</p>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-sm text-gray-600">Views: {{ $promotion->views }}</span>
                            <a href="{{ route('promotions.show', $promotion) }}" class="text-blue-600 text-sm hover:text-blue-800">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
