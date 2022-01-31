<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketPlaceController extends Controller
{
    public function index(Request $request)
    {
        return view('marketplace', [
            'pageTitle' => __('Marketplace Shop'),
            'metaDescription' => __('The best products marketplace'),
        ]);
    }
}
