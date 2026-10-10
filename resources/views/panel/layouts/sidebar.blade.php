@php
    if (request()->is('admin*')) {
        $role = 'admin';
    } elseif (request()->is('instructor*')) {
        $role = 'instructor';
    } else {
        $role = auth('admin')->check() ? 'admin' : (auth()->check() && auth()->user()->role === 'instructor' ? 'instructor' : 'guest');
    }
@endphp

<aside id="desktop-sidebar" class="z-20 hidden h-full w-64 shrink-0 overflow-hidden bg-white dark:bg-gray-800 md:flex flex-col border-r border-slate-100 dark:border-gray-700 transition-colors duration-200">
    <div class="flex h-full min-h-0 flex-col">

        
        <div class="flex h-16 min-h-16 shrink-0 items-center justify-center px-6 border-b border-slate-100 dark:border-gray-700">
            <a href="{{ route($role . '.dashboard') }}" class="flex items-center group">
                <img src="{{ asset('assets/elearning/client/img/logo-sukarobot-academy.png') }}"
                    class="w-auto h-8 md:h-10 object-contain transition-all duration-300 ease-in-out hover:scale-105"
                    alt="Sukarobot Logo" />
            </a>
        </div>

        
        <nav class="min-h-0 flex-1 overflow-y-auto px-4 py-6 custom-scrollbar">
            @include('panel.layouts.menu-items')
        </nav>
    </div>
</aside>
