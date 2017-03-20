<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Balance</title>
  <meta name="author" content="Simon Yeung">
  <meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1, maximum-scale = 1, user-scalable = no" />
  <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/siteOthers.css') }}">
  <!-- import CSS -->
  <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
  <!-- import JavaScript -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="Balance" />
  <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="container" id="app">
  </div>
  <script src="http://localhost:8080/app.js"></script>
</body>
</html>
