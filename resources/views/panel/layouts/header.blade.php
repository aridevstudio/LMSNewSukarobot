@php
    if (request()->is('admin*')) {
        $role = 'admin';
    } elseif (request()->is('instructor*')) {
        $role = 'instructor';
    } else {
        $role = auth('admin')->check() ? 'admin' : (auth()->check() && auth()->user()->role === 'instructor' ? 'instructor' : 'guest');
    }



    $user = ($role === 'admin') ? auth('admin')->user() : auth('web')->user();

    if (!$user && auth('admin')->check())
        $user = auth('admin')->user();
    if (!$user && auth('web')->check())
        $user = auth('web')->user();

    $primaryColor = $role === 'admin' ? 'text-orange-500 dark:text-orange-400' : 'text-blue-700 dark:text-blue-400';
    $primaryRing = $role === 'admin' ? 'focus:ring-orange-500' : 'focus:ring-blue-700';
    $primaryHoverBg = $role === 'admin' ? 'hover:bg-orange-50 dark:hover:bg-gray-700' : 'hover:bg-blue-50 dark:hover:bg-gray-700';

    $avatarGradient = $role === 'admin' ? 'from-orange-500 to-orange-600 shadow-orange-500/20' : 'from-blue-600 to-blue-700 shadow-blue-700/20';
    $headerGradient = $role === 'admin' ? 'from-orange-600 to-orange-500' : 'from-blue-700 to-blue-600';

    $userTypeLabel = $role === 'admin' ? 'Administrator' : 'Instruktur';

    $avatarUrl = '';
    if ($user) {
        $avatarUrl = $user->avatar_url ?? '';
    }
    if (!$avatarUrl && $role === 'instructor') {
        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($user->name ?? 'Instruktur') . '&background=1d4ed8&color=fff';
    }

    $breadcrumb = '';
    if (request()->routeIs('*dashboard*')) {
        $breadcrumb = 'Dashboard';
    } elseif (request()->routeIs('admin.users.*')) {
        $breadcrumb = 'Akun <span class="mx-2 text-slate-400">/</span> User';
    } elseif (request()->routeIs('admin.admins.*')) {
        $breadcrumb = 'Akun <span class="mx-2 text-slate-400">/</span> Admin';
    } elseif (request()->routeIs('admin.instructors.*')) {
        $breadcrumb = 'Akun <span class="mx-2 text-slate-400">/</span> Instruktur';
    } elseif (request()->routeIs('admin.instructor-applications.*')) {
        $breadcrumb = 'Akun <span class="mx-2 text-slate-400">/</span> Pengajuan Instruktur';
    } elseif (request()->routeIs('admin.programs.*')) {
        $breadcrumb = 'Program <span class="mx-2 text-slate-400">/</span> Program';
    } elseif (request()->routeIs('admin.program-approvals.*')) {
        $breadcrumb = 'Program <span class="mx-2 text-slate-400">/</span> Pengajuan Program';
    } elseif (request()->routeIs('admin.training-bookings.*')) {
        $breadcrumb = 'Program <span class="mx-2 text-slate-400">/</span> Persetujuan Pelatihan';
    } elseif (request()->routeIs('admin.program-proofs.*')) {
        $breadcrumb = 'Program <span class="mx-2 text-slate-400">/</span> Bukti Program';
    } elseif (request()->routeIs('admin.certificates.*')) {
        $breadcrumb = 'Program <span class="mx-2 text-slate-400">/</span> Sertifikat';
    } elseif (request()->routeIs('admin.promos.*')) {
        $breadcrumb = 'Promosi <span class="mx-2 text-slate-400">/</span> Promo';
    } elseif (request()->routeIs('admin.vouchers.*')) {
        $breadcrumb = 'Promosi <span class="mx-2 text-slate-400">/</span> Voucher';
    } elseif (request()->routeIs('admin.articles.*')) {
        $breadcrumb = 'Artikel';
    } elseif (request()->routeIs('admin.galleries.*')) {
        $breadcrumb = 'Galeri';
    } elseif (request()->routeIs('admin.broadcasts.*')) {
        $breadcrumb = 'Broadcast';
    } elseif (request()->routeIs('admin.rekap-program.*')) {
        $breadcrumb = 'Rekap Program';
    } elseif (request()->routeIs('*quizzes.*')) {
        $breadcrumb = 'Nilai Tugas Akhir';
    } elseif (request()->routeIs('instructor.assignments.*')) {
        $breadcrumb = 'Kelola Tugas Akhir';
    } elseif (request()->routeIs('instructor.programs.*')) {
        $breadcrumb = 'Pengajuan Program';
    }
@endphp

<header id="panel-header"
    class="relative z-50 h-16 shrink-0 bg-white dark:bg-gray-800 border-b border-slate-100 dark:border-gray-700 transition-colors duration-200">
    
    <div class="flex h-16 items-center justify-between px-3 sm:px-6">

        
        <div class="flex items-center space-x-4">
            
            <button id="mobile-sidebar-btn"
                class="p-2.5 text-slate-500 dark:text-gray-400 rounded-xl md:hidden hover:bg-slate-100 dark:hover:bg-gray-700 hover:text-slate-700 dark:hover:text-gray-200 focus:outline-none focus:ring-2 {{ $primaryRing }} transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <a href="{{ route($role . '.dashboard') }}" class="flex min-w-0 items-center md:hidden" aria-label="Sukarobot Academy">
                <img src="{{ asset('assets/elearning/client/img/logo-sukarobot-academy.png') }}"
                    alt="Sukarobot Academy"
                    class="h-10 w-auto max-w-[9rem] object-contain" />
            </a>

            @if(!empty($breadcrumb))
                <div class="hidden md:flex items-center text-base font-semibold text-slate-700 dark:text-gray-200 ml-2">
                    {!! $breadcrumb !!}
                </div>
            @endif

            @if($role === 'instructor')
                
                <nav class="hidden md:flex items-center space-x-1 ml-4 pl-4 border-l border-slate-200 dark:border-gray-600">
                    
                    <a href="{{ url('/') }}" data-turbo="false"
                        class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200">
                        Home
                    </a>

                    
                    <a href="{{ url('/program') }}" data-turbo="false"
                        class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200">
                        Program
                    </a>
                    
                     
                    <a href="https://katalog.sukarobot.com/" data-turbo="false"
                        class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200">
                        Katalog
                    </a>

                    
                    <div class="relative">
                        <button id="kompetisi-dropdown"
                            class="flex items-center px-3 py-2 text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200">
                            Kompetisi
                            <svg class="w-4 h-4 ml-1 chevron-icon" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="kompetisi-menu"
                            class="hidden dropdown-menu absolute left-0 mt-1 w-44 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-slate-100 dark:border-gray-700 py-1.5 z-50">
                            
                            <div class="relative group/sub-panel">
                                <div class="flex items-center justify-between px-4 py-2 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors cursor-pointer select-none">
                                    <span>BRC</span>
                                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover/sub-panel:text-blue-600 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                                <div class="absolute left-full top-0 ml-1 w-36 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-slate-100 dark:border-gray-700 py-1.5 opacity-0 invisible group-hover/sub-panel:opacity-100 group-hover/sub-panel:visible transition-all duration-200 transform translate-x-1 group-hover/sub-panel:translate-x-0 z-50 before:content-[''] before:absolute before:top-0 before:-left-2 before:w-2 before:h-full">
                                    <a href="#"
                                        class="block px-3.5 py-1.5 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors rounded-lg mx-1">2025</a>
                                    <a href="https://brc.sukarobot.com/" target="_blank" rel="noopener noreferrer"
                                        class="block px-3.5 py-1.5 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors rounded-lg mx-1">2026</a>
                                    <a href="#"
                                        class="block px-3.5 py-1.5 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors rounded-lg mx-1">2027</a>
                                </div>
                            </div>

                            
                            <div class="relative group/sub-panel">
                                <div class="flex items-center justify-between px-4 py-2 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors cursor-pointer select-none">
                                    <span>BSE<span class="text-xs">&</span>C</span>
                                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover/sub-panel:text-blue-600 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                                <div class="absolute left-full top-0 ml-1 w-36 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-slate-100 dark:border-gray-700 py-1.5 opacity-0 invisible group-hover/sub-panel:opacity-100 group-hover/sub-panel:visible transition-all duration-200 transform translate-x-1 group-hover/sub-panel:translate-x-0 z-50 before:content-[''] before:absolute before:top-0 before:-left-2 before:w-2 before:h-full">
                                    <a href="#"
                                        class="block px-3.5 py-1.5 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors rounded-lg mx-1">2025</a>
                                    <a href="#"
                                        class="block px-3.5 py-1.5 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors rounded-lg mx-1">2026</a>
                                    <a href="#"
                                        class="block px-3.5 py-1.5 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors rounded-lg mx-1">2027</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="relative">
                        <button id="tentang-dropdown"
                            class="flex items-center px-3 py-2 text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200">
                            Tentang Sukarobot
                            <svg class="w-4 h-4 ml-1 chevron-icon" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="tentang-menu"
                            class="hidden dropdown-menu absolute left-0 mt-1 w-44 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-slate-100 dark:border-gray-700 py-2 z-50">
                            <a href="{{ url('/instruktur') }}" data-turbo="false"
                                class="block px-4 py-2 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors">Instruktur</a>
                            <a href="{{ url('/tentang') }}" data-turbo="false"
                                class="block px-4 py-2 text-sm font-medium text-slate-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-700 dark:hover:text-blue-400 transition-colors">Tentang
                                Kami</a>
                        </div>
                    </div>

                    
                    <a href="{{ url('/artikel') }}"
                        class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-blue-700 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-gray-700 rounded-lg transition-all duration-200"
                        data-turbo="false">
                        Artikel
                    </a>
                </nav>
            @endif
        </div>

        
        
        <div class="hidden md:block relative">

            <button id="desktop-profile-trigger"
                class="flex items-center space-x-3 p-1.5 pr-4 rounded-xl hover:bg-slate-50 dark:hover:bg-gray-700 focus:outline-none transition-all duration-200 group">
                
                <div class="relative">
                    <img src="{{ $avatarUrl }}" alt="Profile"
                        class="w-10 h-10 rounded-full object-cover">
                </div>

                
                <div class="text-left">
                    <p class="text-sm font-bold text-slate-800 dark:text-gray-200">{{ $user->name ?? $role }}</p>
                    <p class="text-xs text-slate-500 dark:text-gray-400">{{ $userTypeLabel }}</p>
                </div>

                
                <svg class="w-4 h-4 text-slate-400 dark:text-gray-500 chevron-icon" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            
            <div id="desktop-profile-menu"
                class="hidden dropdown-menu absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-slate-100 dark:border-gray-700 py-2 z-50">

                <a href="{{ $role === 'admin' ? route('admin.admins.edit', $user->id) : route('client.dashboard') }}"
                    data-turbo="false"
                    class="block px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 {{ $role === 'admin' ? 'hover:bg-orange-50 dark:hover:bg-gray-700 hover:text-orange-600' : 'hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-600' }}">
                    Profil Saya
                </a>

                <form method="POST" action="{{ route('logout') }}" data-turbo="false">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 cursor-pointer">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        
        <div class="md:hidden relative">
            <button id="mobile-profile-trigger" type="button"
                class="flex items-center space-x-2 p-1.5 rounded-xl hover:bg-slate-50 dark:hover:bg-gray-700 focus:outline-none transition-all duration-200">
                
                <div class="relative">
                    <img src="{{ $avatarUrl }}" alt="Profile"
                        class="w-10 h-10 rounded-full object-cover">
                </div>

                
                <svg class="w-4 h-4 text-slate-400 dark:text-gray-500 chevron-icon" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            
            <div id="mobile-profile-menu"
                class="hidden dropdown-menu-mobile absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-slate-100 dark:border-gray-700 py-2 z-50">

                <a href="{{ $role === 'admin' ? route('admin.admins.edit', $user->id) : route('client.dashboard') }}"
                    data-turbo="false"
                    class="block px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 {{ $role === 'admin' ? 'hover:bg-orange-50 dark:hover:bg-gray-700 hover:text-orange-600' : 'hover:bg-blue-50 dark:hover:bg-gray-700 hover:text-blue-600' }}">
                    Profil Saya
                </a>

                <form method="POST" action="{{ route('logout') }}" data-turbo="false">
                    @csrf
                    <button type="submit"
                        class="block w-full text-left px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 cursor-pointer">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

</header>
