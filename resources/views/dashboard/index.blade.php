@extends('layouts.app')

@section('content')
<div class="bg-[#eae5d5] min-h-screen pb-6">
    <div class="container mx-auto p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-1">
            <!-- Right Column: Text-Based Analytics -->
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold text-black">Total Promotions</h2>
                <p class="text-3xl font-bold text-black">{{ $totalPromotions }}</p>

                <h2 class="text-xl font-semibold text-black mt-6">Total Views</h2>
                <p class="text-3xl font-bold text-black">{{ $totalViews }}</p>

                <h2 class="text-xl font-semibold text-black mt-6">Promotions Posted to Promotions Viewed Ratio</h2>
                <p class="text-3xl font-bold text-black">{{ $promotionsToViewsRatio }}</p>

                <h2 class="text-xl font-semibold text-black mt-6">Best Performing Promotions</h2>
                <ul class="list-disc pl-4 mt-4 text-black"> 
                    @foreach ($bestPerformingPromotions as $promotion)
                    <li>
                        Promotion: {{ $promotion->title }}
                        <br>
                        Views: {{ $promotion->views }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Left Column: Graph -->
            <div class="bg-white shadow-md rounded-lg p-4 flex justify-center items-center">
                <div class="w-full h-96"> 
                    <canvas id="myChart" class="w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <!-- JavaScript code for graph -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var averagePromotionsData = @json($averagePromotionsData);

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: averagePromotionsData.labels,
                    datasets: [{
                        label: 'Average Promotions Created',
                        data: averagePromotionsData.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    }],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Average Promotions Created',
                            },
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Months',
                            },
                        },
                    },
                },
            });
        </script>
    </div>
</div>
@endsection

