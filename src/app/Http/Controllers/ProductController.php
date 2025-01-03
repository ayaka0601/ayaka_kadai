<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::simplePaginate(6);
        return view('index', compact('products'));
    }
    public function add(){
        return view('add');
    }


    public function register()
    {
        return view('/products/register');
    }
    public function confirm(ProductRequest $request)
    {
        $product = $request->only(['name', 'price', 'season_id', 'image', 'description']);
        return view('products/confirm', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $product = $request->only(['name', 'price', 'season_id', 'image', 'description']);
        $image = $request->file('image');
        Product::create($product);
        if($request->hasFile('image')){
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        }
        return view('complete');
    }
}