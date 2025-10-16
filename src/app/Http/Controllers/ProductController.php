<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    /* register */
    public function register(ProductRequest $request){
        $products=$request->only(['name','price','image','description']);
        Product::create($products);
        return redirect('/products');
    }
}
