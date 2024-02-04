<?php

namespace App\Http\Controllers;

use App\Models\Analytics; // Import the Analytics model
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Retrieve analytics data here
        $analytics = Analytics::where('business_id', auth()->id())->first(); // Modify this query based on your logic

        // Pass the analytics data to the view
        return view('analytics.index', compact('analytics'));
    }
}

