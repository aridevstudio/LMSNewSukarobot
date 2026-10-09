<!DOCTYPE html>
<html lang="en"
    data-role="{{ request()->is('admin*') ? 'admin' : (request()->is('instructor*') ? 'instructor' : (auth('admin')->check() ? 'admin' : (auth()->check() && auth()->user()->role === 'instructor' ? 'instructor' : 'guest'))) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Sukarobot</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: 'var(--color-primary-admin)',
                        'primary-dark': 'var(--color-primary-dark-admin)',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                },
            },
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.45.1/dist/apexcharts.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/panel.css'])

    @php
        $cssRole = request()->is('admin*') ? 'admin' : (request()->is('instructor*') ? 'instructor' : (auth('admin')->check() ? 'admin' : 'instructor'));
    @endphp
    <link rel="stylesheet" href="{{ asset('assets/elearning/' . $cssRole . '/css/panel.css') }}">

    <style>
        .btn-float {
            position: fixed;
            bottom: 5rem;
            right: 1.5rem;
            z-index: 40;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-float:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.08);
        }

        .pagination-with-fab {
            margin-bottom: 5rem;
        }

        #loading-screen {
            transition: transform 0.6s cubic-bezier(0.65, 0, 0.35, 1);
        }
    </style>

    <script>
        (function() {
            document.documentElement.classList.remove('dark');

            localStorage.removeItem('theme');
            localStorage.removeItem('darkMode');
            localStorage.removeItem('color-theme');

            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    @stack('styles')
</head>

<body class="m-0 overflow-hidden bg-gray-50 dark:bg-gray-900 font-sans text-gray-900 dark:text-gray-100 antialiased">

    @php
        if (request()->is('admin*')) {
            $role = 'admin';
        } elseif (request()->is('instructor*')) {
            $role = 'instructor';
        } else {
            $role = auth('admin')->check() ? 'admin' : (auth()->check() && auth()->user()->role === 'instructor' ? 'instructor' : 'guest');
        }
    @endphp

    
    <div id="loading-screen" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-white">
        <div class="relative flex flex-col items-center justify-center space-y-6 px-6">
            <div class="flex justify-center">
                <img src="{{ asset('assets/elearning/client/img/logo_sukarobto_bogor.png') }}" alt="Sukarobot"
                    class="h-12 md:h-14 w-auto">
            </div>

            <div class="text-center space-y-2">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">
                    Selamat Datang, {{ auth($role === 'admin' ? 'admin' : 'web')->user()?->name ?? ucfirst($role) }}!
                </h2>
                <p class="text-gray-500 text-sm animate-pulse">
                    Menyiapkan dashboard Anda...
                </p>
            </div>

            <div class="flex items-center gap-2">
                <div class="w-1.5 h-1.5 rounded-full animate-bounce"
                    style="background: {{ $role === 'admin' ? '#F97316' : '#3B82F6' }}; animation-delay: 0s;"></div>
                <div class="w-1.5 h-1.5 rounded-full animate-bounce"
                    style="background: {{ $role === 'admin' ? '#FB923C' : '#60A5FA' }}; animation-delay: 0.2s;"></div>
                <div class="w-1.5 h-1.5 rounded-full animate-bounce"
                    style="background: {{ $role === 'admin' ? '#FED7AA' : '#93C5FD' }}; animation-delay: 0.4s;"></div>
            </div>
        </div>
    </div>

    <script>
        (function () {
            const urlParams = new URLSearchParams(window.location.search);
            const showWelcome = urlParams.get('welcome') === '1';

            if (showWelcome) {
                const loadingScreen = document.getElementById('loading-screen');
                loadingScreen.classList.remove('hidden');
                loadingScreen.classList.add('flex');

                const cleanUrl = window.location.pathname + window.location.hash;
                window.history.replaceState({}, document.title, cleanUrl);

                window.addEventListener('load', function () {
                    setTimeout(function () {
                        loadingScreen.style.transform = 'translateY(-100%)';

                        setTimeout(function () {
                            loadingScreen.style.display = 'none';
                        }, 600);
                    }, 1200);
                });
            }
        })();
    </script>

    <div id="panel-app-shell" class="panel-app-shell fixed inset-0 flex min-h-0 overflow-hidden bg-gray-50 dark:bg-gray-900">
        @include('panel.layouts.sidebar')
        @include('panel.layouts.mobile-sidebar')

        <div class="relative flex h-full min-h-0 min-w-0 flex-1 flex-col overflow-hidden">
            @include('panel.layouts.header')

            <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden">
                <div class="container mx-auto max-w-7xl">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @include('panel.layouts.partials.sweetalert-scripts')

    @php
        $jsRole = request()->is('admin*') ? 'admin' : (request()->is('instructor*') ? 'instructor' : (auth('admin')->check() ? 'admin' : 'instructor'));
    @endphp
    <script src="{{ asset('assets/elearning/' . $jsRole . '/js/header.js') }}"></script>
    <script src="{{ asset('assets/elearning/' . $jsRole . '/js/sidebar.js') }}"></script>

    <script>
        (function() {
            const sidebarNav = document.getElementById('sidebar-nav');
            const STORAGE_KEY = 'sidebar-scroll-position';

            if (sidebarNav) {
                const savedPosition = sessionStorage.getItem(STORAGE_KEY);
                if (savedPosition) {
                    sidebarNav.scrollTop = parseInt(savedPosition, 10);
                }

                window.addEventListener('beforeunload', function() {
                    sessionStorage.setItem(STORAGE_KEY, sidebarNav.scrollTop);
                });

                sidebarNav.addEventListener('scroll', function() {
                    sessionStorage.setItem(STORAGE_KEY, sidebarNav.scrollTop);
                }, { passive: true });
            }
        })();
    </script>

    @stack('scripts')
</body>

</html>
