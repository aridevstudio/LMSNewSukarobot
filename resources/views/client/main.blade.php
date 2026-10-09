<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! SEO::generate() !!}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{  asset('assets/elearning/client/css/partials/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    
    <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.20/dist/lenis.css">

    
    @stack('meta')

    
      @yield('css')
    <script></script>
</head>

<body class="w-full max-w-full bg-gray-50 text-gray-900 antialiased min-h-screen flex flex-col justify-between">
    @include('client.partials.navbar')
    @yield('body')
    @include('client.partials.footer')


@yield('js')

<script src="{{ asset('assets/elearning/client/js/partials/navbar.js') }}"></script>


<script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script>
<script>
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        orientation: 'vertical',
        gestureOrientation: 'vertical',
        smoothWheel: true,
        wheelMultiplier: 1,
        touchMultiplier: 1.5,
        infinite: false,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetEl = document.querySelector(targetId);
                if (targetEl) {
                    e.preventDefault();
                    lenis.scrollTo(targetEl, { offset: -80 });
                }
            }
        });
    });
</script>

</body>

</html>
