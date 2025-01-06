<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Http\Requests\Request;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('price', 'desc')->get();
        $products = Product::orderBy('price', 'asc')->get();
        $products = Product::simplePaginate(6);
        return view('index', compact('products'));
    }


    //public function update(ProductRequest $request)
    //{
        //$product = $request->only(['content']);
        //Product::find($request->id)->update($product);

       //return redirect('/products')->with('message', '商品を更新しました');
    //}




    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Product::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

    public function bind(Product $product)
    {
        $data = [
            'item'=>$product,
        ];
        return view('product.binds', $data);
    }


    public function register(){
        return view('register');
    }

    public function confirm(ProductRequest $request)
    {
        $product = $request->only(['name', 'price', 'image', 'season_id', 'description']);
        return view('confirm', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $product = $request->only(['name', 'price', 'image', 'season_id', 'description']);
        Product::create($product);

        return view('complete');
    }

    public function create(ProductRequest $request)
    {
        $form = $request->all();
        Product::create($form);
        return redirect('/products');
    }

    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        return view('edit', ['form' => $product]);
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Product::find($request->id)->update($form);
        return redirect('/products');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        return view('delete', ['product' => $product]);
    }

    public function remove(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products');
    }

    public function relate()
    {
        $items = Product::all();
        return view('product.index', ['items' => $items]);
    }
}