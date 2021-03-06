<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Balance</title>
  <meta name="author" content="Simon Yeung">
  <meta name="viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1, maximum-scale = 1, user-scalable = no" />
  <meta name="csrf_token" id="csrf_token" content="{{ csrf_token() }}" v-model="token">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.6.0/pure-min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.6.0/grids-responsive-min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/siteOthers.css') }}">
  <!-- import CSS -->
  <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
  <!-- import JavaScript -->
  <script src="https://unpkg.com/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/element-ui/lib/index.js"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <script src="{{ asset('assets/js/site.js') }}"></script>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="Balance" />
</head>

<body>
  <div class="container" id="main-app">
    @yield('content')
  </div>
  <script src="{{ asset('assets/js/i18n/datepicker.en.js') }}"></script>
  <script src="{{ asset('assets/js/moment.js') }}" charset="utf-8"></script>
</body>
</html>
