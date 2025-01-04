<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;



class ProductController extends Controller
{
    public function index()
    {
        $products = Product::simplePaginate(6);
        return view('index', compact('products'));
    }

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

    public function confirm(productRequest $request)
    {
        $content = $request->only(['name', 'price', 'image', 'season_id', 'description']);
        $request->validate([
            'image' => ['image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        $name = $request->name;
        $image = $request->file('image');

        if ($image) {
            // 拡張子の取得
            $extension = $image->getClientOriginalExtension();

            // 新しいファイル名を作る（ランダムな文字数とする）
            $new_name = uniqid() . "." . $extension;

            // 一時的にtmpフォルダに保存する
            $image_path = Storage::putFileAs(
                'tmp',
                $request->file('image'),
                $new_name
            );
        } else {
            $new_name = 'noimage.jpg';
            $extension = '0';
            $image_path = 'noimage.jpg';
        }

        return view('confirm', compact('contact'));
    }

    public function store(ProductRequest $request)
    {
        $contact = $request->only(['name', 'price', 'image', 'season_id', 'description']);
        Product::create($contact);
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