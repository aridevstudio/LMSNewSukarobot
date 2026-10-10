@extends('client.main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/elearning/client/css/about/about.css') }}">
@endsection

@section('body')
<section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-orange-50 pt-28 pb-12 text-center">
    <div class="pointer-events-none absolute -right-16 -top-20 h-72 w-72 rounded-full bg-orange-200/30 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-20 -left-16 h-72 w-72 rounded-full bg-blue-200/30 blur-3xl"></div>

    <div class="relative z-10 mx-auto max-w-4xl px-5 sm:px-6">
        <span class="mb-4 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white/80 px-4 py-1.5 text-xs font-semibold text-blue-700 shadow-sm"><i class="fa-solid fa-users"></i> Tim Sukarobot</span>
        <h1 class="mb-3 text-3xl font-extrabold leading-tight text-gray-900 md:text-5xl">
            Instruktur <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-orange-500">Profesional & Berpengalaman</span>
        </h1>
        <p class="mx-auto mb-6 max-w-2xl text-base leading-relaxed text-gray-600 sm:text-lg">
            Belajar langsung dari para ahli yang siap membimbingmu mencapai potensi terbaik.
        </p>

        <div class="mx-auto w-full max-w-xs text-left">
            <label for="keahlianFilter" class="mb-2 block text-sm font-semibold text-gray-700">Filter berdasarkan keahlian</label>
            <select id="keahlianFilter" class="w-full cursor-pointer rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-700 shadow-sm transition hover:border-blue-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100">
                <option value="all">Semua Keahlian</option>
            </select>
        </div>
    </div>
</section>

<div class="container mx-auto px-6 py-8 max-w-7xl">
    <div id="instructorGrid" class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3"></div>
    <div id="pagination" class="mt-10 flex flex-wrap justify-center gap-2"></div>
</div>

<div class="fixed inset-0 flex items-center justify-center overflow-y-auto overscroll-none p-4 bg-black/60 backdrop-blur-sm hidden z-[9999]" id="modalBg">
    <div role="dialog" aria-modal="true" aria-labelledby="modalInstructorName" class="bg-white rounded-2xl max-w-sm w-full max-h-[calc(100dvh-2rem)] relative flex flex-col shadow-2xl overflow-hidden transform transition-all scale-100">
        <button class="absolute top-3 right-3 bg-white/80 p-1 rounded-full text-gray-500 hover:text-red-500 transition-colors z-10" id="modalClose">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="w-full h-40 sm:h-52 shrink-0 bg-gray-50 flex items-center justify-center">
            <img id="modalImage" class="h-32 w-32 sm:h-40 sm:w-40 rounded-full object-cover ring-4 ring-white shadow-md" src="" alt="Instruktur">
        </div>
        <div id="modalBody" data-lenis-prevent class="min-h-0 flex-1 p-5 overflow-y-auto overscroll-contain"></div>
    </div>
</div>

<script>
    const instructors = {!! json_encode($instructors) !!};
</script>
<script src="{{ asset('assets/elearning/client/js/about/instruktur.js') }}"></script>
@endsection
