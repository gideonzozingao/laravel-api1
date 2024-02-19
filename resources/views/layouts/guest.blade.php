<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div>
            <a href="/" wire:navigate>
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="100.000000pt" height="100.000000pt" viewBox="0 0 600.000000 600.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,600.000000) scale(0.100000,-0.100000)"
fill="red" stroke="none">
<path d="M2800 5903 c-261 -25 -457 -61 -644 -118 -1022 -310 -1796 -1159
-2010 -2205 -46 -228 -59 -387 -53 -665 6 -250 19 -372 62 -565 243 -1090
1105 -1959 2187 -2206 388 -88 812 -96 1203 -23 776 146 1464 611 1900 1284
225 348 370 733 437 1165 17 113 21 181 21 420 1 316 -12 438 -74 690 -200
817 -727 1495 -1472 1894 l-107 58 -68 -23 c-229 -76 -375 -164 -530 -321
-216 -219 -324 -461 -346 -784 l-6 -81 97 -27 c54 -15 150 -48 213 -72 608
-238 930 -654 980 -1269 28 -338 -53 -672 -233 -960 -200 -322 -479 -544 -825
-656 -161 -53 -263 -70 -448 -76 -286 -9 -507 38 -751 161 -448 224 -776 647
-896 1152 -170 714 56 1485 618 2107 233 259 621 517 1008 671 332 132 658
200 969 200 l157 0 -77 34 c-238 105 -562 183 -872 211 -106 10 -358 12 -440
4z"/>
</g>
</svg>
            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
