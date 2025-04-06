@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')

<div class="register-form__content">
    <div class="register-form__heading">
        <h2>登録画面</h2>
    </div>
    <div class="register-form__inner">
        <form class="form" action="/products" method="post" enctype="multipart/form-data">
        @csrf
            <div class="register-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品名</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力" />
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
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力" />
                    </div>
                    <div class="form__error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="register-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品画像</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="file" name="image" value="{{ old('image') }}">
                    </div>
                    <div class="form__error">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="contact-form__group">
                <div class="form__group-title">
                    <span class="form__label--item">季節</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="checkbox">
                    <div class="form__input--text">
                        @foreach ($seasons as $season)
                        <label>
                            <input type="checkbox" name="season_ids[]" value="{{ $season->id }}">{{ $season->name }}
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
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <input type="text" name="description" value="{{ old('description') }}" placeholder="商品の説明を入力"></input>
                    </div>
                    <div class="form__error">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
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