<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;


class ProductController extends Controller
{
    public function index()
    {
        $seasons = Season::all();
        $products = Product::Paginate(6);
        return view('index', compact('products', 'seasons',));
    }

    public function register()
    {
        $products = Product::all();
        $seasons = Season::all();
        return view('register', compact('products', 'seasons'));
    }

    public function store(RegisterRequest $request)
    {
        $product = Product::create(
            $request->only(
            [
                'name',
                'price',
                'season_ids',
                'description',
                'image',
            ])
        );
        $product->seasons()->sync($request->season_ids);
        $product['image'] = $request->image->store('images', 'public');
        $products = Product::paginate(6);
        return view('index',compact('products'));
    }


    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products');
    }

    public function productId()
    {
        $seasons = Season::all();
        return view('index', compact('products', 'seasons',));
    }
}
