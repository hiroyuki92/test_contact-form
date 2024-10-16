<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
</head>
<body>
    <div class="thank-you-container">
        <h1 class="thank-you-text">Thank you</h1>
        <p class="thank-you-message">お問い合わせありがとうございました</p>
        <a href="{{ route('index') }}" class="home-button">HOME</a>
    </div>
</body>
</html>