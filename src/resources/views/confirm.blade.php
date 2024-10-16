@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm__content">
        <div class="confirm__heading">
            <h2>Confirm</h2>
        </div>
        <form class="form" action="/store" method="post">
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
                            <p class="confirm-table__text-p">{{ $contacts['category_content'] }}</p>
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
                <button class="form__button-send__submit" type="submit">送信</button>
</form>
                <button type="button" class="form__button-fix__submit" onclick="window.location='{{ route('index') }}'">修正</button>
            </div>
    </div>

@endsection