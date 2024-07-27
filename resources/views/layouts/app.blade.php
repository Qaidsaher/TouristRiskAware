<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

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

<body class="font-sans antialiased" dir="rtl">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="min-h-[600px]">
            {{ $slot }}
        </main>

        {{-- footer start --}}
        <footer class="bg-teal-800">
            <div class="w-full max-w-screen-xl p-4 py-6 mx-auto lg:py-8">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="{{ route('dashboard') }}" class="flex items-center">
                            <img src="{{asset('image_back/logo.jpg')}}" class="h-8 rounded-full me-3" alt="Logo" />
                            <span class="self-center text-2xl font-semibold text-teal-100 whitespace-nowrap">السفر
                                الآمن</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-teal-100 uppercase">المصادر</h2>
                            <ul class="font-medium text-teal-200">
                                <li class="mb-4">
                                    <a href="{{ route('dashboard') }}" class="text-teal-400 hover:text-teal-300">الموقع
                                        الرئيسي</a>
                                </li>
                                <li>
                                    <a href="{{ route('pages.news') }}"
                                        class="text-teal-400 hover:text-teal-300">الأخبار</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-teal-100 uppercase">تابعنا</h2>
                            <ul class="font-medium text-teal-200">
                                <li class="mb-4">
                                    <a href="{{ route('pages.contact') }}"
                                        class="text-teal-400 hover:text-teal-300">فيسبوك</a>
                                </li>
                                <li>
                                    <a href="{{ route('pages.contact') }}"
                                        class="text-teal-400 hover:text-teal-300">تويتر</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-teal-100 uppercase">القانونية</h2>
                            <ul class="font-medium text-teal-200">
                                <li class="mb-4">
                                    <a href="{{ route('pages.terms') }}"
                                        class="text-teal-400 hover:text-teal-300">سياسة الخصوصية</a>
                                </li>
                                <li>
                                    <a href="{{ route('pages.terms') }}"
                                        class="text-teal-400 hover:text-teal-300">الشروط والأحكام</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 border-teal-600 sm:mx-auto lg:my-8" />
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-center text-teal-200 sm:text-left">© 2024 <a href="#"
                            class="hover:underline">السفر الآمن™</a>. جميع الحقوق محفوظة.</span>
                    <div class="flex justify-center mt-4 sm:mt-0">
                        <a href="#" class="mx-3 text-teal-200 hover:text-teal-100">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 8 19">
                                <path fill-rule="evenodd"
                                    d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">صفحة فيسبوك</span>
                        </a>
                        <a href="#" class="mx-3 text-teal-200 hover:text-teal-100">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 21 16">
                                <path
                                    d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                            </svg>
                            <span class="sr-only">مجتمع ديسكورد</span>
                        </a>
                        <a href="#" class="mx-3 text-teal-200 hover:text-teal-100">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 17">
                                <path fill-rule="evenodd"
                                    d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">صفحة تويتر</span>
                        </a>
                        <a href="#" class="mx-3 text-teal-200 hover:text-teal-100">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.077 2.077 0 0 1 1.51 1.015 2.105 2.105 0 0 0 2.885.822 2.116 2.116 0 0 1 .628-1.34c-2.2-.25-4.516-1.1-4.516-4.877a3.833 3.833 0 0 1 1.014-2.659 3.565 3.565 0 0 1 .1-2.627s.829-.265 2.718 1.014a9.308 9.308 0 0 1 4.946 0c1.887-1.279 2.713-1.014 2.713-1.014.55 1.402.2 2.442.1 2.7a3.822 3.822 0 0 1 1.01 2.658c0 3.786-2.322 4.623-4.529 4.867a2.384 2.384 0 0 1 .685 1.847c0 1.336-.012 2.414-.012 2.741 0 .265.18.573.685.477A9.911 9.911 0 0 0 10 .333Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">حساب جيت هب</span>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        {{-- footer end --}}
    </div>
</body>

</html>
