<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Http\Controllers\DashboardController;
use Carbon\Carbon; //Carbon for date manipulation

class DashboardController extends Controller
{
    public function index()
    {
        // Total Promotions
        $totalPromotions = Promotion::where('business_id', auth()->id())->count();

        // Total Views (Total Promotions Click)
        $totalViews = Promotion::where('business_id', auth()->id())->sum('views');

        // Promotions Posted to Promotions Viewed Ratio (if totalViews is not zero)
        $promotionsToViewsRatio = $totalViews > 0 ? number_format($totalPromotions / $totalViews, 3) : 0.000;

        // Best Performing Promotions (highest views)
        $bestPerformingPromotions = Promotion::where('business_id', auth()->id())
            ->orderByDesc('views')
            ->limit(3) 
            ->get();

        // Calculate Promotion Views data (you can customize this)
        $promotionViews = DB::table('promotions')
            ->select('title', 'views')
            ->where('business_id', auth()->id())
            ->orderBy('views', 'desc')
            ->limit(5) 
            ->get();

        // Calculate average promotions planned for each month
        $averagePromotionsData = $this->calculateAveragePromotionsByMonth();

        return view('dashboard.index', compact('totalPromotions', 'totalViews', 'promotionsToViewsRatio', 'bestPerformingPromotions', 'promotionViews', 'averagePromotionsData'));
    }


    private function calculateAveragePromotionsByMonth()
    {
        $months = [];
        $data = [];

        // Loop through each month and calculate the average promotions planned
        for ($i = 1; $i <= 12; $i++) {
            $monthName = Carbon::create(null, $i, 1)->format('M'); // Get month abbreviation (e.g., Jan)
            
            // Perform a query to get the average promotions planned for this month
            $averagePromotions = Promotion::where('business_id', auth()->id())
                ->whereMonth('start_date', $i)
                ->whereMonth('end_date', '>=', $i)
                ->count();

            $months[] = $monthName;
            $data[] = $averagePromotions;
        }

        return [
            'labels' => $months,
            'data' => $data,
        ];
    }
}



