<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function welcome()
    {
        // Retrieve promotions data (you can customize this query)
        $promotions = Promotion::orderBy('created_at', 'desc')->take(5)->get();
     
        return view('welcome', compact('promotions'));
    }
    
    public function index()
    {
        $promotions = Promotion::where('business_id', auth()->id())->get();
        return view('promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|max:1024', // Max 1MB file
        ]);

        $validatedData['business_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('promotions', 'public');
        }

        Promotion::create($validatedData);

        return redirect()->route('promotions.index')->with('success', 'Promotion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        $promotion->increment('views');
        return view('promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|max:1024', // Max 1MB file
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($promotion->image) {
                Storage::delete($promotion->image);
            }
            $validatedData['image'] = $request->file('image')->store('promotions', 'public');
        }

        $promotion->update($validatedData);

        return redirect()->route('promotions.index')->with('success', 'Promotion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        if ($promotion->image) {
            Storage::delete($promotion->image);
        }
        
        $promotion->delete();

        return redirect()->route('promotions.index')->with('success', 'Promotion deleted successfully.');
    }
}

