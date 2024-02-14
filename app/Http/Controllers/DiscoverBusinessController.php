<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiscoverBusiness;

class DiscoverBusinessController extends Controller
{
    public function index()
    {
        return view('business.index');
    }
}
