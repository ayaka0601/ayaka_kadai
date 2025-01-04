<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index(Request $request)
    {
        $items = Season::with('product')->get();
        return view('season.index', ['items' => $items]);
    }

    public function add()
    {
        return view('season.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Season::$rules);
        $form = $request->all();
        Season::create($form);
        return redirect('/products');
    }
}
