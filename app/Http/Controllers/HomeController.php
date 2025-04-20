<?php

namespace App\Http\Controllers;

use App\Models\HomeDescription;
use App\Models\HomeService;
use App\Models\HomeProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $desc = HomeDescription::first();

        $services = HomeService::all();

        $products = HomeProduct::all();

        return view('home', compact('desc', 'services', 'products'));
    }
}
