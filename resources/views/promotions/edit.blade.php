{{-- resources/views/promotions/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="bg-[#eae5d5] min-h-screen pb-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-3 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Promotion</h1>

                <form method="POST" action="{{ route('promotions.update', $promotion) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                        <input type="text" id="title" name="title" value="{{ $promotion->title }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $promotion->description }}</textarea>
                    </div>

                    <div class="flex gap-2 mb-4">
                        <div class="flex-1">
                            <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date', date('Y-m-d', strtotime($promotion->start_date))) }}" required class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="flex-1">
                            <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{ old('end_date', date('Y-m-d', strtotime($promotion->end_date))) }}" required class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Product or service image</label>
                        @if($promotion->image)
                        <img src="{{ Storage::url($promotion->image) }}" alt="Current Promotion Image" class="block mb-3 h-20 w-20 object-cover rounded-md">
                        @endif
                        <input type="file" id="image" name="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                        <a href="{{ route('promotions.index') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-700 text-white font-semibold rounded-md">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

