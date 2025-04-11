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
        $data = $request->only(
            [
                'name',
                'price',
                'season_ids',
                'description',
                'image',
            ]
        );
        $data['image'] = 'storage/' . $request->image->store('images', 'public');
        $product = Product::create($data);
        $product->seasons()->sync($request->season_ids);
        $products = Product::paginate(6);
        return view('index',compact('products'));
    }

    public function show($productId){
        $product = Product::findOrFail($productId);
        $seasons = Season::all();
        return view('show', compact('product', 'seasons'));
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Product::find($request->id)->update($form);
        return redirect('/products');
    }

    public function search(Request $request)
    {
        // dd($request->all());
    $query = Product::query();
    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }
    if ($request->filled('price-list')) {
        $order = $request->get('price-list') == 'asc' ? 'asc' : 'desc';
        $query->orderBy('price', $order);
    }
    $products = $query->paginate(10)->appends($request->all());
    return view('index', compact('products'));
    }
}