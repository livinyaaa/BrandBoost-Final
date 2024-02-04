<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;


class WelcomeController extends Controller
{
    public function index(){
        $promotions = Promotion::all();

        return view('welcome', compact('promotions'));
    }
}
