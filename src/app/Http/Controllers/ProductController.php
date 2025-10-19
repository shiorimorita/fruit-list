<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Season;

class ProductController extends Controller
{

    /* register view */
    public function registerView()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    /* register action */
    public function register(ProductRequest $request)
    {
        $data = $request->only(['name', 'price', 'description']);
        $data['image'] = $request->file('image')->store('images', 'public');
        $product = Product::create($data);

        $product->seasons()->attach($request->seasons);

        return redirect('/products');
    }

    /* products view */
    public function productsView()
    {
        $products = Product::paginate(6);
        return view('index', compact('products'));
    }

    /* products detail */
    public function detail($id)
    {
        $product = Product::with('seasons')->find($id);
        $seasons = Season::all();
        return view('show', compact('product', 'seasons'));
    }

    /* products update */
    public function update(ProductRequest $request)
    {
        $product = $request->only(['name', 'price', 'description']);
        $pash = $request->file('image')->store('images', 'public');
        $product['image'] = $pash;

        Product::find($request->id)->update($product);
        Product::find($request->id)->seasons()->sync($request->seasons);
        return redirect('/products');
    }

    /* products delete */
    public function delete($id)
    {

        $product = Product::find($id);
        $product->seasons()->detach();
        $product->delete();
        return redirect('/products');
    }

    /* products search */
    public function search(Request $request)
    {

        $products = Product::query()
            ->searchKeywords($request->keyword)
            ->sortByPrice($request->sort)
            ->paginate(6);

        /* 並び替えラベル */
        // $sort_label = match ($request->sort) {
        //     'price_up' => '価格の高い順',
        //     'price_down' => '価格の安い順',
        //     default=>''
        // };

        $sort_labels =[
            'price_up' => '価格の高い順',
            'price_down' => '価格の安い順'
        ];

        $sort_label=$sort_labels[$request->sort];

        return view('index', compact('products', 'sort_label'));
    }
}
