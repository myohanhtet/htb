<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="ရန်ကုန်တိုင်းဒေသကြီး၊ ကမာရွတ်မြို့နယ်၊ ထန်းတပင်ကျောင်းတိုက်၊ ဆုတောင်းပြည့်ကိုးနဝင်းကပ်ကျော်သိမ်ဦးစေတီတော်" />
    <meta name="author" content="myohanhtet" />
    <title>Htantabin Monastery</title>

    <meta property="og:title" content="Htantabin Monastery">
    <meta property="og:description" content="ရန်ကုန်တိုင်းဒေသကြီး၊ ကမာရွတ်မြို့နယ်၊ ထန်းတပင်ကျောင်းတိုက်၊ ဆုတောင်းပြည့်ကိုးနဝင်းကပ်ကျော်သိမ်ဦးစေတီတော်">
    <meta property="og:image" content="{{ url('image/bg.jpg') }}">
    <meta property="og:url" content="http://htantabin.com/">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('image/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('image/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('image/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('image/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('image/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    @yield('css')
</head>
<body>
@include('frontend.layouts.nav')
<!-- Page Content-->
<div class="container-fluid px-4 px-lg-5">
@yield('content')
    <!-- Content Row-->
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
