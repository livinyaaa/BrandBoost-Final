@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                @if ($promotion->image)
                    <img src="{{ Storage::url($promotion->image) }}" alt="{{ $promotion->title }}" class="w-full object-cover">
                @endif
            </div>
            <div class="p-6">
                <h1 class="text-4xl font-semibold mb-2">{{ $promotion->title }}</h1>
                <p class="mt-10 text-gray-600 text-sm mb-4">{{ $promotion->description }}</p>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-900 text-sm font-bold">Promotion Period: {{ $promotion->start_date }} to {{ $promotion->end_date }}</p>
                        <p class="mt-2 text-gray-600 text-sm">Views: {{ $promotion->views }}</p>
                    </div>
                    <a href="{{ route('home') }}" class="mt-5 inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white font-semibold rounded-md">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

