@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-4xl font-semibold mb-2">Analytics for {{ $business->name }}</h1>
            <p class="mt-10 text-gray-600 text-sm mb-4">Total Promotions: {{ $analytics->total_promotions }}</p>
            <p class="mt-2 text-gray-600 text-sm">Total Views: {{ $analytics->total_views }}</p>
            <p class="mt-2 text-gray-600 text-sm">Average View Count: {{ $analytics->average_view_count }}</p>
            <p class="mt-2 text-gray-600 text-sm">Average Session Duration: {{ $analytics->average_session_duration }}</p>
        </div>
    </div>
</div>
@endsection
