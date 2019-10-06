<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
  body{
    font-family:'小塚ゴシック Pro6N R','ヒラギノ角ゴ Pro W3','Hiragino Kaku Gothic Pro','メイリオ',Meiryo,'ＭＳ Ｐゴシック', Arial, sans-serif;
  }
  </style>
</head>
<body>

<div id="header">
    <div class="container">
        <div id="header-left">
            <a href="/"><img id="header-logo" src="{{ asset('images/readme/logo.png') }}" alt="Lunchers"></a>
        </div>
        <div id="header-right">
        </div>
    </div>
</div>
<div id="app-content">
    <div class="container">
        @yield('content')
    </div>
</div>
<div id="footer">
    <div class="container">
        <div class="footer-relation-service">
            <h4>関連サイト</h4>
        </div>
        <p id="footer-copyright">Copyright © nakazaway</p>
    </div>
<div>

</body>
</html>