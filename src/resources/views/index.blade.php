@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="product-form__content">
    <div class="product-form__heading">
        <h2>商品一覧</h2>
    </div>
    <div class="product-form__inner">
        <form class="form" action="/products/register" method="get" enctype="multipart/form-data">
            <button class="header-nav__button">＋商品を追加</button>
        </form>
        <div class="product-form__group">
            <input type="text" name="search" placeholder="商品名で検索">
        </div>
            <input type="submit" name="search" value="検索">
        <div class="product-form__group">
            <h3>価格順で表示</h3>
        </div>
        <select class="select" name="price-list">
            <option value="">価格で並べ替え</option>
            <option value="asc" {{ request('price-list') == 'asc' ? 'selected' : '' }}>安い順</option>
            <option value="desc" {{ request('price-list') == 'desc' ? 'selected' : '' }}>高い順</option>
        </select>
    </div>
    <div class="form__product">
        @foreach($products as $product)
            <div class="product-item">
                    <img src="{{  $product->image }}" class="small-img">
                    
                    <div>{{ $product->name }} ¥{{ number_format($product->price) }}</div>
            </div>
        @endforeach

        <div> {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection