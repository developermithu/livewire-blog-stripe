<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="author" content="Mithu Das" />

{{-- Facebook Meta Tags --}}
<meta property="og:title" content="@yield('title')">
<meta property="og:type" content="article" />
<meta property="og:description" content="@yield('description')">
<meta property="og:image" content="@yield('metaImage')">
{{-- <meta property="og:image:type" content="image/jpeg"> --}}
<meta property="og:url" content="http://mithu.epizy.com">

{{-- Twitter Meta Tags --}}
<meta name="twitter:title" content="@yield('title')">
<meta name="twitter:description" content="@yield('description')">
<meta name="twitter:site" content="{{ config('settings.twitter.handle') }}">
<meta name="twitter:image" content="@yield('metaImage')">
<meta name="twitter:card" content="summary_large_image">

<title>@yield('title', 'Guest Layout')</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@300;400;700&family=Inria+Serif:wght@300;400;700&display=swap" rel="stylesheet">

{{-- AOS --}}
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

{{-- highlight.js --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/atom-one-dark.min.css">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

{{-- Livewire --}}
<livewire:styles />

{{-- Blade UI Kit --}}
@bukStyles(true)
