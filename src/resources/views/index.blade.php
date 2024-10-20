@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="{{ route('confirm') }}" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__group--name">
                    <input class="form__group--name-input" type="text" name="last_name" placeholder="例:山田"  value="{{ old('last_name', $contacts['last_name'] ?? '') }}" />
                    <input class="form__group--name-input" type="text" name="first_name" placeholder="例:太郎"  value="{{ old('first_name', $contacts['first_name'] ?? '') }}" />
                </div>
                <div class="form__error-name">
                    <div class="form__error-last_name">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error-first_name">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__group--gender">
                    <label><input type="radio" name="gender" value="1"{{ old('gender', $contacts['gender'] ?? '1') == '1' ? 'checked' : '' }}>男性</label>
                    <label><input type="radio" name="gender" value="2"{{ old('gender', $contacts['gender'] ?? '') == '2' ? 'checked' : '' }}>女性</label>
                    <label><input type="radio" name="gender" value="3"{{ old('gender', $contacts['gender'] ?? '') == '3' ? 'checked' : '' }}>その他</label>
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__group--email">
                    <input class="form__group--email-input" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email', $contacts['email'] ?? '') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__group--tel">
                    <input class="form__group--tel-input" type="tel" name="tel1" placeholder="080"  value="{{ old('tel1', $contacts['tel1'] ?? '') }}" />
                        <div class="form__input--tel-hyphen">-</div>
                    <input class="form__group--tel-input"  type="tel" name="tel2" placeholder="1234"  value="{{ old('tel2', $contacts['tel2'] ?? '') }}" />
                        <div class="form__input--tel-hyphen">-</div>
                    <input class="form__group--tel-input" type="tel" name="tel3" placeholder="5678"  value="{{ old('tel3', $contacts['tel3'] ?? '') }}" />
                </div>
                <div class="form__error-tel">
                    <div class="form__error-tel1">
                        @error('tel1')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error-tel2">
                        @error('tel2')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error-tel3">
                        @error('tel3')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__group--address">
                    <input class="form__group--address-input" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', $contacts['address'] ?? '') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__group--building">
                    <input class="form__group--building-input" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building', $contacts['building'] ?? '') }}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="select-wrapper">
                <select class="form__group--category" name="category_id">
                    <option value="" selected="selected">選択してください</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}"
                    {{ (string) old('category_id', $contacts['category_id'] ?? '') === (string) $category->id ? 'selected' : '' }}>
                    {{ $category['content'] }}
                    </option>
                    @endforeach
                </select>
                <div class="form__error">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group--detail">
            <div class="form__group--detail-content">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <textarea name="detail" placeholder="お問い合わせ内容をご記入ください">{{ old('detail', $contacts['detail'] ?? '') }}</textarea>
                <div class="form__error">
                @error('detail')
                    {{ $message }}
                @enderror
                </div>
            </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection