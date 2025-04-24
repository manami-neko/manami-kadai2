@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('content')

<div class="profile-form__content">
    <div class="profile-form__heading">
        <h2>Profile</h2>
    </div>

    <form class="form" action="/profile" method="post">
        @csrf
        <div class="profile-form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="radio__submit">
                <div class="form__input--text">
                    <input type="radio" name="gender" value="1" checked />男性
                    <input type="radio" name="gender" value="2" />女性
                    <input type="radio" name="gender" value="3" />その他
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="profile-form__group">
            <div class="form__group-title">
                <span class="form__label--item">誕生日</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__input--text">
                <input type="data" name="birthday" value="{{ old('birthday') }}" />
            </div>
            <div class="form__error">
                @error('birthday')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form__button">
            <button class="register__button-submit" type="submit">登録</button>
        </div>
</div>

@endsection