@php
    if (request()->is('admin*')) {
        $role = 'admin';
    } elseif (request()->is('instructor*')) {
        $role = 'instructor';
    } else {
        $role = auth('admin')->check() ? 'admin' : (auth()->check() && auth()->user()->role === 'instructor' ? 'instructor' : 'guest');
    }
@endphp


<div id="mobile-sidebar-overlay"
    class="hidden absolute inset-x-0 top-16 bottom-0 z-30 bg-black bg-opacity-50 transition-opacity duration-150 md:hidden"></div>


<aside id="mobile-sidebar"
    class="absolute left-0 top-16 bottom-0 z-40 flex w-64 max-w-[min(18rem,calc(100vw-2rem))] shrink-0 -translate-x-full flex-col bg-white transition-transform duration-300 ease-in-out dark:bg-gray-800 md:hidden">

    <div class="min-h-0 flex-1 overflow-y-auto py-4 text-gray-500 dark:text-gray-400">
        <div class="px-4">
            @include('panel.layouts.menu-items')
        </div>
    </div>
</aside>
