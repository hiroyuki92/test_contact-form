@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>Confirm</h2>
        </div>
        <form class="form" action="{{ route('store') }}" method="post">
            @csrf
            <div class="confirm-table">
                <table class="confirm-table__inner">
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text-name">
                            <input type="text" name="last_name"  value="{{ $contacts['last_name'] }}" readonly />
                            <input type="text" name="first_name"  value="{{ $contacts['first_name'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">性別</th>
                        <td class="confirm-table__text">
                            <input type="text" name="gender"
                            value="@if($contacts['gender'] == 1) 男性
                            @elseif($contacts['gender'] == 2) 女性
                            @else その他
                            @endif" "readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">メールアドレス</th>
                        <td class="confirm-table__text">
                            <input type="email" name="email" value="{{ $contacts['email'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                            <input type="tel" name="tel" value="{{ $contacts['tel'] }}" readonly />
                            <input type="hidden" name="tel1" value="{{ old('tel1', $contacts['tel1'] ?? '') }}">
                            <input type="hidden" name="tel2" value="{{ old('tel2', $contacts['tel2'] ?? '') }}">
                            <input type="hidden" name="tel3" value="{{ old('tel3', $contacts['tel3'] ?? '') }}">
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                            <input type="text" name="address" value="{{ $contacts['address'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                            <input type="text" name="building" value="{{ $contacts['building'] }}" readonly />
                        </td>
                    </tr>
                    <tr class="confirm-table__row">
                        <th class="confirm-table__header">お問い合わせの種類</th>
                        <td class="confirm-table__text">
                            <p class="confirm-table__text-p">{{ old('category_content', $contacts['category_content'] ?? '未選択') }}</p>
                        </td>
                    </tr>
                    <tr class="confirm-table__row-last">
                        <th class="confirm-table__header">お問い合わせ内容</th>
                        <td class="confirm-table__text">
                            <input type="text" name="detail" value="{{ $contacts['detail'] }}" readonly />
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form__button">
                <input type="hidden" name="category_id" value="{{ old('category_id', $contacts['category_id'] ?? '') }}">
                <button class="form__button-send__submit" type="submit">送信</button>
            </div>
        </form>
        <form class="form__fix" action="/" method="get">
            <input type="hidden" name="last_name" value="{{ $contacts['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contacts['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $contacts['gender'] }}">
            <input type="hidden" name="email" value="{{ $contacts['email'] }}">
            <input type="hidden" name="tel1" value="{{ $contacts['tel1'] }}">
            <input type="hidden" name="tel2" value="{{ $contacts['tel2'] }}">
            <input type="hidden" name="tel3" value="{{ $contacts['tel3'] }}">
            <input type="hidden" name="address" value="{{ $contacts['address'] }}">
            <input type="hidden" name="building" value="{{ $contacts['building'] }}">
            <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $contacts['detail'] }}">
            <button type="submit" class="form__button-fix__submit">修正</button>
        </form>
    </div>
@endsection