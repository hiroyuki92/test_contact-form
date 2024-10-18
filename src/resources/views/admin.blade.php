<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact form</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="header__inner">
                <div class="header-utilities">
                    <div class="header__logo">FashionablyLate</div>
                    <nav>
                        <ul class="header-nav">
                            <li class="header-nav__item">
                                <form class="form-logout" action="/logout" method="post">
                                    @csrf
                                    <button class="header-nav__link">logout</button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <div class="admin__content">
                <div class="admin-form__heading">
                    <h2 class="logo">Admin</h2>
                </div>
                <form class="search-form" action="#" method="GET">
                @csrf
                    <input type="text" class="search-input" placeholder="名前やメールアドレスを入力してください">
                    <select class="search-select">
                        <option value="" selected="selected">性別</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                    <select class="search-select">
                        <option value="selected">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}"> {{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input type="date" class="search-date">
                    <button type="submit" class="search-button">検索</button>
                    <button type="reset" class="reset-button">リセット</button>
                </form>
                <div class="admin-form__sub-title">
                    <div class="export-button">
                        <button class="export-button__submit">エクスポート</button>
                    </div>
                    <div class="pagination-wrapper">
                    {{ $contacts->links('pagination::bootstrap-4') }}
                    </div>
                </div>
                <table class="admin-table">
                    <thead>
                        <tr class=admin-table__title>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                            <th>　　</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                            <td>@if($contact->gender == 1)
                            男性
                            @elseif($contact->gender == 2)
                            女性
                            @else
                            その他
                            @endif
                            </td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->category->content }}</td>
                            <td><button class="detail-button">詳細</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>