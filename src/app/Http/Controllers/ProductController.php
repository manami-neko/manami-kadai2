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
    $query = Product::query();

    // 検索キーワードで絞り込み
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // 並び替え処理（オプション）
    if ($request->filled('price-list')) {
        $order = $request->get('price-list') == 'asc' ? 'asc' : 'desc';
        $query->orderBy('price', $order);
    }

    $products = $query->paginate(10)->appends($request->all());

    return view('/products', compact('products'));
    }
}