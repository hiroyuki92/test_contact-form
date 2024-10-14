<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact form</title>
        <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
            @yield('css')
        <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    </head>
    <body>
        <header class="header">
            <div class="header__inner">
                <div class="header__logo">FashionablyLate</div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </body>
</html>