@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')

<div class="register-form__inner">
        <form class="form" action="/products" method="post" enctype="multipart/form-data">
        @csrf
            <div class="register-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品画像</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <img src="{{  $product->image }}">
                    </div>
                        <input type="file" name="image" value="{{ old('image') }}">
                    </div>
                    <div class="form__error">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <div type="text">{{ $product->name }} </div>
                    </div>
                    <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">値段</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <div type="text">{{ number_format($product->price) }}</div>
                    </div>
                    <div class="form__error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="contact-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">季節</span>
                </div>
                <div class="checkbox">
                    <div class="form__input--text">
                        @foreach ($seasons as $season)
                        <label>
                            <input type="checkbox" name="season_ids[]" value="{{ $product->name }}">{{ $season->name }}
                        </label>
                        @endforeach
                    </div>
                    <div class="form__error">
                        @error('season_ids')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="contact-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品説明</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <div type="text">{{ $product->description }} </div>
                    </div>
                    <div class="form__error">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form__button">
                <button class="form__button-submit" type="submit">変更を保存</button>
            </div>
        </form>
        <form class="form" action="/products" method="get">
            <div class="form__button">
                <button class="form__button-submit" type="submit">戻る</button>
            </div>
        </form>
    </div>
</div>

@endsection