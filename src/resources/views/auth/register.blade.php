<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact form</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    </head>
    <body>
        <header class="header">
            <div class="header__inner">
                <div class="header-utilities">
                    <div class="header__logo">FashionablyLate</div>
                    <nav>
                        <ul class="header-nav">
                            <li class="header-nav__item">
                                <a href="/login" class="header-nav__link">login</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <div class="register__content">
                <div class="register-form__heading">
                    <h2 class="logo">Register</h2>
                </div>
                <form class="form"  action="/register" method="post">
                @csrf
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">お名前</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="name" placeholder="例:山田　太郎" value="{{ old('name') }}" />
                            </div>
                            <div class="form__error">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">メールアドレス</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
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
                            <span class="form__label--item">パスワード</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="password" name="password" placeholder="例:coachtech1106" />
                            </div>
                            <div class="form__error">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">
                            登録
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>