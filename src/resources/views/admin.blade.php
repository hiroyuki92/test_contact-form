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
                        <option value="">性別</option>
                        <option value="male">男性</option>
                        <option value="female">女性</option>
                    </select>
                    <select class="search-select">
                        <option value="">お問い合わせの種類</option>
                        <option value="交換">商品の交換について</option>
                        <option value="返品">返品について</option>
                    </select>
                    <input type="date" class="search-date">
                    <button type="submit" class="search-button">検索</button>
                    <button type="reset" class="reset-button">リセット</button>
                </form>
                <div class="export"><button class="export-button">エクスポート</button></div>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                            <th>　　</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>山田 太郎</td>
                            <td>男性</td>
                            <td>test@example.com</td>
                            <td>商品の交換について</td>
                            <td><button class="detail-button">詳細</button></td>
                        </tr>
                        <tr>
                            <td>山田 太郎</td>
                            <td>男性</td>
                            <td>test@example.com</td>
                            <td>商品の交換について</td>
                            <td><button class="detail-button">詳細</button></td>
                        </tr>
                        <tr>
                            <td>山田 太郎</td>
                            <td>男性</td>
                            <td>test@example.com</td>
                            <td>商品の交換について</td>
                            <td><button class="detail-button">詳細</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
</html>