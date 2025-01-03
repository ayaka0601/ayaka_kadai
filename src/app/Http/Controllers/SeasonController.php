<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(Request $request)
    {
        $items = Season::with('name')->get();
        return view('season.index', ['items' => $items]);
    }
}
