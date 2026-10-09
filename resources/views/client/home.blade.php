@extends('client.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/elearning/client/css/home.css') }}?v={{ filemtime(public_path('assets/elearning/client/css/home.css')) }}">
@endsection
 
@section('body')

    
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    
    @if(isset($activePromo) && $activePromo)
    <div id="popup" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden
                 w-[85%] max-w-[280px] sm:max-w-[320px] md:max-w-[360px] lg:max-w-[400px]
                 transform transition-all duration-300 scale-90">
            
            <button id="closePopup"
                class="absolute top-2 right-2 p-1.5 sm:p-2 rounded-full z-1 text-gray-700 font-bold text-lg leading-none hover:bg-gray-200">
                ×
            </button>

            
            <img src="{{ asset($activePromo->poster_image) }}" alt="{{ $activePromo->title }}"
                class="w-full h-auto rounded-b-2xl object-cover scale-100" />
        </div>
    </div>
    @endif

    

    
    <section class="hero pt-32 pb-20 bg-gradient-to-br from-blue-50 via-white to-orange-50 relative overflow-hidden">
        
        <div
            class="absolute top-20 right-0 w-[500px] h-[500px] bg-orange-200/20 rounded-full blur-[100px] animate-pulse pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-200/20 rounded-full blur-[100px] animate-pulse pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
            
            <div data-aos="fade-right" data-aos-duration="1000">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-gray-900 mb-6">
                    Belajar Keahlian <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-orange-500">Robotika, Coding, Animasi, Desain, Web dan AI</span>
                    dengan Mudah
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-xl">
                    Pilih program belajar yang sesuai untuk mengembangkan keterampilan Anda bersama para pengajar
                    berpengalaman.
                </p>
                <div class="flex items-center gap-2.5 sm:gap-4">
                    <a href="#category"
                        class="flex-1 sm:flex-initial text-center justify-center inline-flex items-center px-3.5 sm:px-8 py-3 sm:py-4 text-xs sm:text-base font-bold bg-blue-600 text-white rounded-xl shadow-lg hover:shadow-blue-500/30 hover:scale-105 transition-all duration-300 whitespace-nowrap">
                        Jelajahi Program
                    </a>
                    <a href="#event"
                        class="flex-1 sm:flex-initial text-center justify-center inline-flex items-center px-3.5 sm:px-8 py-3 sm:py-4 text-xs sm:text-base font-bold bg-white text-gray-700 rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 hover:scale-105 transition-all duration-300 whitespace-nowrap">
                        Lihat Kompetisi
                    </a>
                </div>
            </div>

            
            <div class="relative" data-aos="fade-left" data-aos-duration="1000">
                <div
                    class="relative z-10 bg-white p-4 rounded-3xl shadow-2xl transform rotate-2 hover:rotate-0 transition-all duration-500">
                    <picture>
                        <img src="{{ asset('assets/elearning/client/img/gedung-sukarobot-sukabumi.png') }}"
                            alt="Gedung Sukarobot Cabang Sukabumi"
                            fetchpriority="high"
                            loading="eager"
                            class="w-full rounded-2xl object-cover h-[400px] lg:h-[500px]">
                    </picture>

                    
                    <div class="absolute -bottom-6 -left-6 bg-white/95 backdrop-blur-sm p-3.5 sm:p-4 rounded-2xl shadow-xl border border-gray-100 flex items-center gap-3.5 z-20 animate-bounce"
                        style="animation-duration: 4s;">
                        <div class="w-12 h-12 bg-amber-50 border border-amber-200/80 rounded-xl flex items-center justify-center text-amber-500 shadow-sm">
                            <i class="fa-solid fa-award text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 font-medium">Dapatkan</p>
                            <p class="font-bold text-gray-900">Sertifikat Resmi</p>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -top-10 -right-10 grid grid-cols-5 gap-2 opacity-20">
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                    <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="py-8 lg:py-10 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8" data-aos="fade-up">
                
                <div
                    class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-4 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <i class="fa-solid fa-award text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Sertifikat Resmi</h3>
                    <p class="text-xs text-gray-500">Dari Lembaga Terakreditasi & BNSP</p>
                </div>

                
                <div
                    class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-500 mb-4 group-hover:bg-orange-500 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Instruktur Ahli</h3>
                    <p class="text-xs text-gray-500">Berpengalaman > 5 tahun</p>
                </div>

                
                <div
                    class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Akses Fleksibel</h3>
                    <p class="text-xs text-gray-500">Belajar kapanpun dimanapun</p>
                </div>

                
                <div
                    class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center text-green-600 mb-4 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Materi Lengkap</h3>
                    <p class="text-xs text-gray-500">Video, E-book, & Kuis</p>
                </div>

                
                <div
                    class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform duration-300">
                    <div
                        class="w-16 h-16 bg-pink-50 rounded-2xl flex items-center justify-center text-pink-600 mb-4 group-hover:bg-pink-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Akses Multi-Device</h3>
                    <p class="text-xs text-gray-500">Smartphone, Tablet, Laptop</p>
                </div>
            </div>
        </div>
    </section>



    
    <section id="category" class="py-10 lg:py-12 bg-gradient-to-b from-white via-[#FAFBFD] to-white relative overflow-hidden">
        
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-blue-50/50 blur-2xl pointer-events-none -z-0"></div>
        
        
        <div class="absolute top-1/2 -right-16 -translate-y-1/2 w-80 h-80 pointer-events-none opacity-40 -z-0">
            <svg viewBox="0 0 200 200" fill="none" class="w-full h-full text-slate-300">
                <path d="M10,100 C60,20 140,180 190,100 C140,20 60,180 10,100 Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-12">
                
                
                <div class="w-full lg:w-72 xl:w-80 shrink-0" data-aos="fade-right">
                    <div class="flex items-center gap-2.5 mb-3.5">
                        <span class="w-6 h-[2.5px] bg-blue-600 rounded-full inline-block"></span>
                        <span class="text-xs font-bold tracking-[0.18em] uppercase text-slate-500">PROGRAM KAMI</span>
                    </div>
                    <h2 class="text-3xl lg:text-[38px] font-extrabold text-slate-900 tracking-tight leading-[1.2]">
                        Jelajahi Kategori<br>Program
                    </h2>
                    <p class="text-slate-500 text-sm leading-relaxed mt-4 max-w-[280px]">
                        Pilih kategori yang sesuai dengan kebutuhan belajar Anda.
                    </p>
                </div>

                
                <div class="w-full flex-1 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-5" data-aos="fade-left" data-aos-delay="100">

                    
                    <a href="{{ url('/program?category=kursus') }}"
                       class="group relative bg-[#F2F7FF] rounded-[24px] p-6 min-h-[220px] lg:min-h-[240px] flex flex-col justify-between border border-[#E1EDFB] hover:border-blue-300 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden">
                        
                        <div class="absolute -bottom-10 -right-10 w-28 h-28 rounded-full bg-[#DCEBFE] opacity-75 pointer-events-none transition-transform duration-500 group-hover:scale-125"></div>

                        <div class="relative z-10">
                            
                            <div class="w-12 h-12 rounded-2xl bg-[#E1EEFF] border border-blue-200/60 flex items-center justify-center text-[#2563EB] mb-6 group-hover:bg-[#2563EB] group-hover:text-white group-hover:border-[#2563EB] transition-all duration-300 shadow-xs">
                                <svg class="w-6 h-6 stroke-[1.8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base lg:text-lg group-hover:text-blue-600 transition-colors">Kursus</h3>
                        </div>

                        
                        <div class="relative z-10 pt-4">
                            <div class="w-9 h-9 rounded-full bg-white/90 shadow-xs border border-blue-100 flex items-center justify-center text-slate-700 group-hover:bg-[#2563EB] group-hover:text-white group-hover:border-[#2563EB] transition-all duration-300">
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </a>

                    
                    <a href="{{ url('/program?category=pelatihan') }}"
                       class="group relative bg-[#FDF9F2] rounded-[24px] p-6 min-h-[220px] lg:min-h-[240px] flex flex-col justify-between border border-[#FCECD8] hover:border-amber-300 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden">
                        
                        <div class="absolute -bottom-10 -right-10 w-28 h-28 rounded-full bg-[#FCE5C8] opacity-75 pointer-events-none transition-transform duration-500 group-hover:scale-125"></div>

                        <div class="relative z-10">
                            
                            <div class="w-12 h-12 rounded-2xl bg-[#FAECD8] border border-amber-200/60 flex items-center justify-center text-[#9A6735] mb-6 group-hover:bg-[#9A6735] group-hover:text-white group-hover:border-[#9A6735] transition-all duration-300 shadow-xs">
                                <svg class="w-6 h-6 stroke-[1.8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v1.069m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base lg:text-lg group-hover:text-amber-800 transition-colors">Pelatihan</h3>
                        </div>

                        
                        <div class="relative z-10 pt-4">
                            <div class="w-9 h-9 rounded-full bg-white/90 shadow-xs border border-amber-100 flex items-center justify-center text-slate-700 group-hover:bg-[#9A6735] group-hover:text-white group-hover:border-[#9A6735] transition-all duration-300">
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </a>

                    
                    <a href="{{ url('/program?category=go-to-school') }}"
                       class="group relative bg-[#F1FAF5] rounded-[24px] p-6 min-h-[220px] lg:min-h-[240px] flex flex-col justify-between border border-[#DCF2E4] hover:border-emerald-300 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden">
                        
                        <div class="absolute -bottom-3 -right-3 w-24 h-24 text-emerald-200/80 pointer-events-none transition-transform duration-500 group-hover:scale-110">
                            <svg viewBox="0 0 100 100" fill="currentColor" class="w-full h-full">
                                <path d="M75,95 C45,90 25,70 18,40 C38,40 65,55 75,95 Z" opacity="0.8"/>
                                <path d="M95,72 C72,72 52,52 46,20 C68,20 88,35 95,72 Z" opacity="0.6"/>
                                <path d="M92,95 C78,65 58,60 32,55 C48,85 72,95 92,95 Z" opacity="0.4"/>
                            </svg>
                        </div>

                        <div class="relative z-10">
                            
                            <div class="w-12 h-12 rounded-2xl bg-[#DDF4E6] border border-emerald-200/60 flex items-center justify-center text-[#1E7E4E] mb-6 group-hover:bg-[#1E7E4E] group-hover:text-white group-hover:border-[#1E7E4E] transition-all duration-300 shadow-xs">
                                <svg class="w-6 h-6 stroke-[1.8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3L3 8.5v1.5h18V8.5L12 3zM5 10v7M9 10v7M15 10v7M19 10v7M3 17h18v3H3v-3z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base lg:text-lg group-hover:text-emerald-800 transition-colors">Go to School</h3>
                        </div>

                        
                        <div class="relative z-10 pt-4">
                            <div class="w-9 h-9 rounded-full bg-white/90 shadow-xs border border-emerald-100 flex items-center justify-center text-slate-700 group-hover:bg-[#1E7E4E] group-hover:text-white group-hover:border-[#1E7E4E] transition-all duration-300">
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </a>

                    
                    <a href="{{ url('/program?category=holiday-program') }}"
                       class="group relative bg-[#F9F5FE] rounded-[24px] p-6 min-h-[220px] lg:min-h-[240px] flex flex-col justify-between border border-[#EFE5FC] hover:border-purple-300 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 overflow-hidden">
                        
                        <div class="absolute -bottom-6 -right-6 w-28 h-28 text-purple-200/70 pointer-events-none transition-transform duration-500 group-hover:scale-125">
                            <svg viewBox="0 0 100 100" fill="currentColor" class="w-full h-full">
                                <path d="M25,100 C25,75 55,65 65,45 C75,25 85,45 100,55 L100,100 Z" />
                            </svg>
                        </div>

                        <div class="relative z-10">
                            
                            <div class="w-12 h-12 rounded-2xl bg-[#EFE3FC] border border-purple-200/60 flex items-center justify-center text-[#7E42CE] mb-6 group-hover:bg-[#7E42CE] group-hover:text-white group-hover:border-[#7E42CE] transition-all duration-300 shadow-xs">
                                <svg class="w-6 h-6 stroke-[1.8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-900 text-base lg:text-lg group-hover:text-purple-800 transition-colors">Holiday Program</h3>
                        </div>

                        
                        <div class="relative z-10 pt-4">
                            <div class="w-9 h-9 rounded-full bg-white/90 shadow-xs border border-purple-100 flex items-center justify-center text-slate-700 group-hover:bg-[#7E42CE] group-hover:text-white group-hover:border-[#7E42CE] transition-all duration-300">
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    
    <section id="program" class="pt-6 pb-8 lg:pt-8 lg:pb-10 bg-gradient-to-r from-blue-50/70 via-indigo-50/40 to-amber-50/60 relative overflow-hidden">
        
        <div class="absolute -top-16 -left-16 w-[450px] h-[350px] bg-blue-200/45 rounded-full blur-3xl pointer-events-none -z-0"></div>
        <div class="absolute -bottom-16 -right-16 w-[450px] h-[350px] bg-orange-200/40 rounded-full blur-3xl pointer-events-none -z-0"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-purple-100/35 rounded-full blur-3xl pointer-events-none -z-0"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-8" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-900">Program Terpopuler</h2>
                <p class="text-gray-600 mt-2">Kelas pilihan yang paling banyak diminati siswa</p>
            </div>

            <div class="relative">
                @if($popularPrograms->isNotEmpty())
                    <div class="swiper programSwiper pb-4 px-4">
                        <div class="swiper-wrapper">
                            @foreach ($popularPrograms as $program)
                                
                                <div class="swiper-slide h-auto">
                                    <a href="{{ route('client.program.detail', $program->slug) }}"
                                        class="block program-card bg-white rounded-2xl shadow-sm transition-all duration-300 border border-gray-100 overflow-hidden group flex flex-col">
                                        <div class="relative overflow-hidden">
                                            @php
                                                $programImageUrl = ($program->image && str_starts_with($program->image, 'images/'))
                                                    ? asset($program->image) 
                                                    : ($program->image ? asset('storage/' . $program->image) : asset('assets/elearning/client/img/home1.jpeg'));
                                                
                                                $now = \Carbon\Carbon::now();
                                                $startDate = \Carbon\Carbon::parse($program->start_date);
                                                $endDate = \Carbon\Carbon::parse($program->end_date);
                                                $isRunning = $now->between($startDate, $endDate);
                                                $isFinished = $now->gt($endDate);
                                            @endphp
                                            <img src="{{ $programImageUrl }}"
                                                alt="{{ $program->program }}"
                                                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                                                
                                            @if($program->available_slots == 0)
                                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center z-20">
                                                    <span class="bg-red-600 text-white text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider shadow-lg">
                                                        Kuota Habis
                                                    </span>
                                                </div>
                                            @elseif($isFinished)
                                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center z-20">
                                                    <span class="bg-gray-600 text-white text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider shadow-lg">
                                                        Selesai
                                                    </span>
                                                </div>
                                            @elseif($isRunning)
                                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center z-20">
                                                    <span class="bg-blue-600 text-white text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider shadow-lg">
                                                        Sedang Berjalan
                                                    </span>
                                                </div>
                                            @endif

                                            <div
                                                class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 z-20">
                                                {{ ucfirst($program->category) }}
                                            </div>
                                            
                                            <div
                                                class="absolute inset-0 bg-black/80 p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-300 flex items-center justify-center text-center z-10">
                                                <p class="text-white text-sm leading-relaxed line-clamp-4">
                                                    {{ $program->description }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="p-5 flex flex-col">
                                            <div class="flex items-center gap-1 mb-2">
                                                <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <span
                                                    class="text-sm font-bold text-gray-700">{{ number_format($program->rating, 1) }}</span>
                                                <span class="text-xs text-gray-500">({{ $program->total_reviews }} Review)</span>
                                            </div>
                                            <h3
                                                class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition-colors">
                                                {{ $program->program }}
                                            </h3>
                                            <div class="text-sm text-gray-500 mb-4 space-y-2">
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                    <span>Oleh: {{ $program->instructor_name ?? 'Sukarobot' }}</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                        </path>
                                                    </svg>
                                                    <span>Kuota: {{ $program->available_slots }} Slot</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                    <span>Pelaksanaan: {{ ucfirst($program->type) }}</span>
                                                </div>
                                            </div>
                                            <div
                                                class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between relative z-20 bg-white">
                                                <span class="text-lg font-bold text-orange-500">Rp
                                                    {{ number_format($program->price, 0, ',', '.') }}</span>
                                                <div
                                                    class="p-2 bg-blue-50 text-blue-600 rounded-lg group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    
                    <button
                        class="program-prev absolute top-1/2 -left-4 lg:-left-6 z-30 w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white transition-all duration-300 focus:outline-none transform -translate-y-1/2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button
                        class="program-next absolute top-1/2 -right-4 lg:-right-6 z-30 w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white transition-all duration-300 focus:outline-none transform -translate-y-1/2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                @else
                    
                    <div class="w-full flex flex-col items-center justify-center py-12 px-4 text-center">
                        <div class="relative w-48 h-48 mb-6 animate-bounce" style="animation-duration: 3s;">
                            
                            <svg class="w-full h-full drop-shadow-xl" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                
                                <circle cx="100" cy="100" r="80" class="fill-blue-50 animate-pulse" style="animation-duration: 4s;"/>
                                
                                
                                <path d="M60 90C60 67.9086 77.9086 50 100 50C122.091 50 140 67.9086 140 90V130C140 141.046 131.046 150 120 150H80C68.9543 150 60 141.046 60 130V90Z" class="fill-white"/>
                                <rect x="75" y="80" width="15" height="15" rx="7.5" class="fill-blue-200"/>
                                <rect x="110" y="80" width="15" height="15" rx="7.5" class="fill-blue-200"/>
                                <path d="M85 115C85 115 90 122 100 122C110 122 115 115 115 115" stroke="#93C5FD" stroke-width="4" stroke-linecap="round"/>
                                
                                
                                <g class="origin-center animate-[spin_10s_linear_infinite]" style="transform-box: fill-box;">
                                    <path d="M160 50L170 45L165 35L155 40L160 50Z" class="fill-orange-400"/>
                                    <circle cx="160" cy="45" r="3" class="fill-white"/>
                                </g>

                                
                                <path d="M130 130L150 150" stroke="#F97316" stroke-width="8" stroke-linecap="round"/>
                                <circle cx="125" cy="125" r="15" class="stroke-orange-500 fill-white" stroke-width="4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Program</h3>
                        <p class="text-gray-500 max-w-xs mx-auto mb-6">
                            Saat ini kami sedang menyiapkan program terbaik untuk Anda. Cek kembali nanti ya!
                        </p>
                        <a href="#category" class="inline-flex items-center gap-2 px-6 py-2.5 bg-blue-50 text-blue-600 rounded-full font-semibold hover:bg-blue-100 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                            Lihat Kategori Lain
                        </a>
                    </div>
                @endif
        </div>
        </div>
    </section>

    <section class="relative z-10 isolate py-6 lg:py-8 bg-gradient-to-b from-white via-slate-50/50 to-white">
        <div class="w-full mx-auto px-4 sm:px-6 lg:px-10">
            <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden bg-gradient-to-br from-[#1D4ED8] via-[#1E40AF] to-[#0F172A] p-6 sm:p-8 lg:p-9 shadow-xl shadow-blue-950/15 border border-blue-400/20 text-center">
                
                
                <div class="absolute inset-0 opacity-[0.06] pointer-events-none" style="background-image: radial-gradient(rgba(255, 255, 255, 0.8) 1px, transparent 1px); background-size: 20px 20px;"></div>
                
                
                <div class="absolute -top-20 -left-20 w-60 h-60 bg-cyan-400/25 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-20 -right-20 w-60 h-60 bg-orange-500/20 rounded-full blur-3xl pointer-events-none"></div>

                
                <div class="relative z-10 max-w-2xl mx-auto">
                    
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-[11px] sm:text-xs font-semibold tracking-wider uppercase mb-3 shadow-xs">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-400 animate-pulse"></span>
                        <span>Mulai Perjalanan Robotika</span>
                    </div>

                    
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-snug mb-2.5">
                        Siap Mengembangkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-orange-300 to-amber-200">Skill & Potensi</span> Anda?
                    </h2>

                    
                    <p class="text-blue-100/90 text-xs sm:text-sm leading-relaxed mb-5 max-w-lg mx-auto font-normal">
                        Bergabunglah dengan siswa lainnya dan mulai eksplorasi bersama para instruktur berpengalaman.
                    </p>

                    
                    <div class="flex justify-center items-center mb-5">
                        <a href="#instructor"
                           class="inline-flex items-center justify-center gap-2 px-6 py-2.5 sm:px-7 sm:py-3 bg-white text-blue-700 font-bold text-xs sm:text-sm rounded-xl shadow-md hover:bg-blue-50 hover:shadow-lg hover:scale-105 transition-all duration-300 group">
                            <i class="fa-solid fa-user-graduate text-xs text-blue-600"></i>
                            <span>Instruktur Kami</span>
                            <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform text-blue-500"></i>
                        </a>
                    </div>

                    
                    <div class="pt-4 border-t border-white/10 flex flex-wrap items-center justify-center gap-y-1.5 gap-x-4 sm:gap-x-6 text-[11px] sm:text-xs text-blue-200/90 font-medium">
                        <div class="flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-check text-amber-400 text-xs"></i>
                            <span>100% Praktik & Hands-on</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-check text-amber-400 text-xs"></i>
                            <span>Mentor Berdedikasi</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <i class="fa-solid fa-circle-check text-amber-400 text-xs"></i>
                            <span>Sertifikat Terakreditasi</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    
    
                
                

                
                

                
                

    
    <section id="event" class="pt-8 pb-16 lg:pt-10 lg:pb-20 mb-8 lg:mb-10 bg-white overflow-visible">
        <div class="text-center mb-8" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900">Kompetisi Robotik</h2>
            <p class="text-gray-600 mt-2">Tunjukkan bakatmu dan raih prestasi di tingkat nasional</p>
        </div>

        <div class="max-w-7xl mx-auto px-8 lg:px-12 relative">
            <div class="swiper mySwiper pb-12" data-aos="fade-up" data-aos-delay="200">
                <div class="swiper-wrapper">
                    
                    <div class="swiper-slide">
                        <div
                            class="bg-white rounded-3xl border border-gray-100 overflow-hidden group flex flex-col lg:flex-row">
                            <div class="relative lg:w-1/2 h-64 lg:h-auto overflow-hidden">
                                <img src="{{ asset('assets/elearning/client/img/logo-brc.png') }}" alt="BRC"
                                    class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:bg-gradient-to-r">
                                </div>
                            </div>
                            <div class="p-8 lg:w-1/2 flex flex-col justify-center">
                                <h3 class="text-3xl font-bold text-gray-900 mb-2">BRC (Botani Robotic Competition)</h3>
                                <p class="text-blue-600 font-semibold mb-6">Tingkat Nasional</p>
                                <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                                    BRC merupakan kompetisi tahunan yang luar biasa. Karena kegiatan ini bukan hanya tentang
                                    teknologi dan robot, tetapi juga tentang kolaborasi, inovasi dan semangat untuk belajar.
                                    Selain itu hadiah menarik dan penghargaan yang menanti untuk para pemenang!
                                </p>                                
                                <div class="flex items-center">
                                    <a href="https://brc.sukarobot.com/" target="_blank" rel="noopener noreferrer"
                                        class="px-8 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors shadow-lg hover:shadow-blue-600/30">
                                        Daftar Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="swiper-slide">
                        <div
                        class="bg-white rounded-3xl border border-gray-100 overflow-hidden group flex flex-col lg:flex-row">
                        <div class="relative lg:w-1/2 h-64 lg:h-auto overflow-hidden">
                            <img src="{{ asset('assets/elearning/client/img/logo-src.webp') }}" alt="Logo Sukabumi Robotic Competition (SRC)"
                                class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent lg:bg-gradient-to-r">
                            </div>
                        </div>
                        <div class="p-8 lg:w-1/2 flex flex-col justify-center">
                            <h3 class="text-3xl font-bold text-gray-900 mb-2">SRC (Sukabumi Robotic Competition)</h3>
                            <p class="text-blue-600 font-semibold mb-6">🏆 Tingkat Nasional</p>
                            <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                                SRC merupakan kompetisi tahunan yang luar biasa. Karena kegiatan ini bukan hanya tentang
                                teknologi dan robot, tetapi juga tentang kolaborasi, inovasi dan semangat untuk belajar.
                                Selain itu hadiah menarik dan penghargaan yang menanti untuk para pemenang!
                            </p>
                            <div class="flex items-center">
                                <a href="https://wa.me/6285795899901?text={{ urlencode('Halo, saya ingin bertanya tentang pendaftaran Sukabumi Robotic Competition (SRC).') }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="px-8 py-3 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 transition-colors shadow-lg hover:shadow-orange-500/30">
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <button id="prevBtn"
                class="absolute top-1/2 left-0 lg:left-4 z-10 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white transition-all duration-300 focus:outline-none transform -translate-y-1/2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button id="nextBtn"
                class="absolute top-1/2 right-0 lg:right-4 z-10 w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white transition-all duration-300 focus:outline-none transform -translate-y-1/2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </section>


    
    <section id="instructor" class="pt-10 pb-6 lg:pt-12 lg:pb-8 bg-gradient-to-b from-slate-50 via-sky-50/40 to-slate-50 relative overflow-hidden">
        
        <div class="absolute top-1/3 -left-20 w-80 h-80 bg-sky-200/25 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-10 -right-20 w-80 h-80 bg-blue-100/30 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="text-center mb-3 lg:mb-4" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-semibold mb-1.5">
                    <i class="fa-solid fa-code text-blue-500"></i>
                    <span>Mentor & Tim Ahli</span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 tracking-tight mb-1">
                    Instruktur &amp; Pengembang
                </h2>
                <p class="text-sm text-gray-600 max-w-xl mx-auto">
                    Belajar langsung dari para pendidik profesional yang berpengalaman.
                </p>
            </div>

            
            <div class="relative px-2 sm:px-4">
                <div class="swiper instructorSwiper py-1 px-1">
                    <div class="swiper-wrapper">
                        @foreach ($instructors as $instructor)
                            
                            <div class="swiper-slide h-auto">
                                <div class="h-full px-1 py-2">
                                    <article class="flex h-full min-h-52 flex-col rounded-2xl border border-gray-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                                        <div class="flex items-center gap-4">
                                            <img src="{{ $instructor->foto }}" alt="{{ $instructor->nama }}" class="h-16 w-16 shrink-0 rounded-2xl bg-blue-50 object-cover ring-4 ring-blue-50" />
                                            <div class="min-w-0">
                                                <h3 class="truncate text-base font-bold text-gray-900">{{ $instructor->nama }}</h3>
                                                <p class="mt-1 truncate text-sm font-medium text-blue-600">{{ $instructor->jabatan }}</p>
                                            </div>
                                        </div>
                                        <p class="mt-4 line-clamp-3 text-sm leading-relaxed text-gray-600">{{ $instructor->deskripsi }}</p>
                                        <a href="{{ url('/instruktur') }}?highlight={{ urlencode($instructor->nama) }}" class="mt-auto inline-flex items-center gap-2 pt-4 text-sm font-semibold text-blue-600 hover:text-blue-700">
                                            Lihat profil <i class="fa-solid fa-arrow-right text-xs"></i>
                                        </a>
                                    </article>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                
                <button
                    class="instr-prev absolute top-1/2 -left-3 sm:-left-5 lg:-left-6 z-30 w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-full shadow-lg border border-gray-100 flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white transition-all duration-300 focus:outline-none transform -translate-y-1/2 cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button
                    class="instr-next absolute top-1/2 -right-3 sm:-right-5 lg:-right-6 z-30 w-10 h-10 lg:w-12 lg:h-12 bg-white rounded-full shadow-lg border border-gray-100 flex items-center justify-center text-gray-700 hover:bg-blue-600 hover:text-white transition-all duration-300 focus:outline-none transform -translate-y-1/2 cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            
            <div class="mt-4 sm:mt-5 text-center" data-aos="fade-up">
                <a href="{{ url('/instruktur') }}" class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md">
                    <i class="fa-solid fa-users-gear"></i>
                    <span>Lihat Semua Instruktur</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </section>

    
    <section id="galeri" class="pt-5 pb-14 lg:pt-10 lg:pb-16 bg-white relative overflow-hidden">
        
        <div class="absolute top-1/2 left-0 w-96 h-96 bg-blue-100/40 rounded-full blur-3xl -translate-y-1/2 pointer-events-none"></div>
        <div class="absolute top-1/2 right-0 w-96 h-96 bg-orange-100/40 rounded-full blur-3xl -translate-y-1/2 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-8" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-semibold mb-3">
                    <i class="fa-solid fa-camera text-blue-500"></i>
                    <span>Dokumentasi & Galeri</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Aktivitas & Keseruan Siswa
                </h2>
                <p class="text-gray-600 mt-3 max-w-2xl mx-auto text-base">
                    Potret suasana belajar interaktif, eksplorasi teknologi robotika, dan momen seru di Sukarobot Cabang Sukabumi.
                </p>
            </div>

            @if(isset($galleries) && $galleries->count() > 0)
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="gallery-grid">
                    @foreach($galleries as $item)
                        @php
                            $catSlug = Str::slug($item->category ?? 'kegiatan');
                        @endphp
                        <a href="{{ url('/galeri?kategori=' . $catSlug) }}"
                           class="gallery-card group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 flex flex-col block"
                           data-category="{{ $catSlug }}"
                           data-aos="fade-up">
                            
                            
                            <div class="aspect-[4/3] w-full overflow-hidden bg-gray-100 relative">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                     loading="lazy">

                                
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-950/80 via-gray-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                    <span class="text-white text-xs font-medium line-clamp-2">
                                        {{ $item->description ?: 'Lihat dokumentasi ' . ($item->category ?? 'kegiatan') . ' selengkapnya' }}
                                    </span>
                                    <div class="mt-2 flex items-center gap-1.5 text-blue-300 text-xs font-semibold">
                                        <span>Buka Galeri {{ $item->category ?? 'Kegiatan' }}</span>
                                        <i class="fa-solid fa-arrow-right text-[11px] group-hover:translate-x-1 transition-transform"></i>
                                    </div>
                                </div>

                                
                                <div class="absolute top-3 left-3 z-10">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-white/90 backdrop-blur-md text-gray-800 shadow-sm border border-white/50">
                                        {{ $item->category ?? 'Kegiatan' }}
                                    </span>
                                </div>
                            </div>

                            
                            <div class="p-4">
                                <h3 class="font-bold text-gray-900 text-sm line-clamp-1 group-hover:text-blue-600 transition-colors">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 flex items-center gap-1.5">
                                    <i class="fa-regular fa-clock text-[10px] text-gray-400"></i>
                                    <span>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</span>
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

                
                <div class="mt-12 text-center" data-aos="fade-up">
                    <a href="{{ url('/galeri') }}"
                        class="inline-flex items-center gap-2 px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg hover:shadow-blue-500/30 hover:scale-105 transition-all duration-300 text-sm">
                        <span>Lihat Semua Foto Galeri</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                    <i class="fa-regular fa-images text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500 text-sm">Dokumentasi kegiatan akan segera diperbarui.</p>
                </div>
            @endif
        </div>
    </section>

    
    <section id="partner" class="py-16 bg-gray-50 border-y border-gray-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 mb-10 text-center">
            <h2 class="text-2xl font-bold text-gray-900">Bekerja Sama Dengan</h2>
        </div>

        <div class="partner-wrapper relative">
            
            <div class="partner-track flex items-center track-left mb-8">
                <img src="/assets/elearning/client/img/nusaputra.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Universitas Nusa Putra">
                <img src="/assets/elearning/client/img/almatuq.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Madrasah Al-Matuq">
                <img src="/assets/elearning/client/img/smpkhalifah.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMP Khalifah">
                <img src="/assets/elearning/client/img/attartil.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SDIT Qu Attartil">
                <img src="/assets/elearning/client/img/attakwin.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SDIT At Takwin">
                <img src="/assets/elearning/client/img/islamfathia.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SD & SMP Islam Fathia">
                <img src="/assets/elearning/client/img/bpkpenabur.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="TKK, SDK, SMK BPK Penabur Sukabumi">
                <img src="/assets/elearning/client/img/mardiwaluya.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SD Mardi Waluya Sukabumi">
                
                <img src="/assets/elearning/client/img/sekolahalamindonesia.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Sekolah Alam Indonesia Sukabumi">
                <img src="/assets/elearning/client/img/yuwabhakti.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SD Yuwati Bhakti Sukabumi">
                <img src="/assets/elearning/client/img/sitadzkia.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SDIT & SMPIT Adzkia Sukabumi">
                <img src="/assets/elearning/client/img/alumanaa.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMP & SMA Al-Umanaa Sukabumi">
            </div>

            
            <div class="partner-track flex items-center track-right mb-8">
                <img src="/assets/elearning/client/img/sditinsani.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SDIT Insani Sukabumi">
                <img src="/assets/elearning/client/img/andalusia.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SDIT Andalusia Sukabumi">
                <img src="/assets/elearning/client/img/hayatanthayyibah.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMPIT Hayatan Thayyibah Sukabumi">
                <img src="/assets/elearning/client/img/ibadurrahman.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMK Ibadurrahman Sukabumi">
                <img src="/assets/elearning/client/img/gunungguruh.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMKN Gunungguruh Sukabumi">
                <img src="/assets/elearning/client/img/rahmaniyah.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMP IT Rahmaniyah Sukabumi">
                <img src="/assets/elearning/client/img/tunasharapan.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SDK Tunas Harapan Bogor">
                <img src="/assets/elearning/client/img/darussalam.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMK Darussalam Sukabumi">
                <img src="/assets/elearning/client/img/informatikacbi.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMK Informatika CBI Sukabumi">
                <img src="/assets/elearning/client/img/abdibangsa.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMK Komputer Abdi Bangsa Sukabumi">
                <img src="/assets/elearning/client/img/amalislami.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMK IT Amal Islami Sukabumi">
                <img src="/assets/elearning/client/img/teknologikarawang.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMK Teknologi Karawang">
            </div>

            
            <div class="partner-track flex items-center track-left">
                <img src="/assets/elearning/client/img/ululalbab.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="SMK Ulul Albab Sukabumi">
                <img src="/assets/elearning/client/img/ipb.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="DEPARTEMEN ILMU KOMPUTER FMIPA IPB">         
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Lambang_Kota_Sukabumi_Vektor.svg?uselang=id"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Kota Sukabumi">
                <img src="https://upload.wikimedia.org/wikipedia/commons/archive/6/6a/20170428132038%21Lambang_Kab_Sukabumi.svg?uselang=id"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Kabupaten Sukabumi">
                <img src="/assets/elearning/client/img/dispusipda.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="DISPUSIPDA Kota Sukabumi">
                <img src="/assets/elearning/client/img/sdmtik.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="LSP SDMTIK">
                <img src="/assets/elearning/client/img/perpuscisarua.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Perpustakaan Kelurahan Cisarua">
                <img src="/assets/elearning/client/img/arei.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Asosiasi Robotik Edukasi Indonesia">
                <img src="/assets/elearning/client/img/dinaspendidikan.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Dinas Pendidikan Kota Sukabumi">
                <img src="/assets/elearning/client/img/lspteknologidigital.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="LSP Teknologi Digital">
                
                <img src="/assets/elearning/client/img/lsppelatinas.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="LSP Pelatinas">                
                <img src="/assets/elearning/client/img/PRSI.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Persatuan Robotika Seluruh Indonesia">
                <img src="/assets/elearning/client/img/botanisquare.png"
                    class="partner-logo h-8 md:h-10 mx-8"
                    alt="Botani Mal Square">
                
            </div>
        </div>
    </section>

    
    <section id="contact" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <div data-aos="fade-right">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Punya Pertanyaan? <br> <span
                            class="text-blue-600">Diskusikan dengan Kami</span></h2>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan tentang program, pendaftaran, atau
                        kerjasama. Tim kami siap membantu Anda.
                    </p>

                    <div class="mt-5 flex justify-center md:justify-end">
                        <img src="{{ asset('assets/elearning/client/img/eventilustrator.jpeg') }}" alt="Ilustrasi Tanya"
                            class="w-56 sm:w-64 md:w-72 rounded-xl select-none" />
                    </div>
                </div>

                
                <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100" data-aos="fade-left">
                    

                    @if(session('error'))
                        <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-xl border border-red-100 flex items-center gap-3">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="contactForm" action="{{ route('client.contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                                placeholder="Masukkan nama Anda">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nomor HP</label>
                                <input type="tel" name="phone" required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                                    placeholder="0812xxxx">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Pertanyaan</label>
                            <textarea rows="4" name="message" required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none"
                                placeholder="Tuliskan pertanyaan Anda disini..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-xl shadow-lg hover:shadow-emerald-600/30 transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                            <span>Kirim Pesan via WhatsApp</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
    <section id="lokasi" class="scroll-mt-24 py-10 sm:py-14 bg-gradient-to-b from-white via-slate-50 to-blue-50/20 border-t border-gray-100 relative overflow-hidden">
        
        <div class="absolute -top-24 right-0 w-80 h-80 bg-blue-200/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 left-0 w-80 h-80 bg-orange-200/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 relative z-10">
            
            <div class="text-center max-w-2xl mx-auto mb-6 sm:mb-8" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold mb-2.5 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    <i class="fa-solid fa-location-dot text-xs"></i>
                    <span>Lokasi Sukarobot Sukabumi</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                    Kunjungi Kantor & Tempat Belajar Kami
                </h2>
                <p class="text-gray-600 text-xs sm:text-sm mt-2 leading-relaxed">
                    Temukan lokasi kami dengan mudah di Google Maps. Datang dan konsultasikan program robotika, coding, dan teknologi masa depan langsung bersama instruktur kami.
                </p>
            </div>

            
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up">
                <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
                    
                    @php
                        $opStatus = $operationalStatus ?? \App\Services\OperationalScheduleService::getStatus();
                    @endphp
                    <div class="lg:col-span-5 p-5 sm:p-6 lg:p-7 flex flex-col justify-between bg-gradient-to-b from-slate-50/80 via-white to-blue-50/30 border-b lg:border-b-0 lg:border-r border-gray-100 space-y-4">
                        
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium {{ $opStatus['tagBadgeClass'] }} shadow-xs" title="{{ $opStatus['description'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $opStatus['dotClass'] }} flex-shrink-0"></span>
                                    <span class="inline-flex items-center gap-1">
                                        <strong class="font-bold">{{ $opStatus['statusText'] }}</strong>
                                        <span class="opacity-85 font-normal">&middot; {{ $opStatus['subText'] }}</span>
                                    </span>
                                </span>
                                <span class="text-[11px] font-medium text-gray-400">
                                    Cikole, Kota Sukabumi
                                </span>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-snug">
                                Sukarobot Academy Cabang Sukabumi
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 mt-1.5 leading-relaxed">
                                Ruang belajar interaktif untuk eksplorasi robotika, pemrograman anak & remaja, IoT, serta mengadakan berbagai perlombaan bergengsi.
                            </p>
                        </div>

                        
                        <div class="bg-white p-3.5 sm:p-4 rounded-xl border border-gray-100 shadow-xs space-y-2.5">
                            <div class="flex items-center gap-2 pb-2 border-b border-gray-100 text-gray-900">
                                <div class="w-7 h-7 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center text-xs flex-shrink-0">
                                    <i class="fa-regular fa-clock"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs sm:text-sm">Jam Operasional</h4>
                                    <p class="text-[10px] text-gray-500">Waktu kunjungan tatap muka</p>
                                </div>
                            </div>
                            
                            <ul class="space-y-1.5 text-xs text-gray-600">
                                <li class="flex items-center justify-between {{ ($opStatus['isOpenToday'] && now('Asia/Jakarta')->isWeekday()) ? 'bg-emerald-50/70 py-0.5 px-2 rounded-md -mx-1' : '' }}">
                                    <span class="font-medium {{ ($opStatus['isOpenToday'] && now('Asia/Jakarta')->isWeekday()) ? 'text-emerald-800 font-semibold' : 'text-gray-500' }}">Senin - Jumat</span>
                                    <span class="font-semibold text-gray-800">08:00 - 16:00 WIB</span>
                                </li>
                                <li class="flex items-center justify-between {{ ($opStatus['isOpenToday'] && now('Asia/Jakarta')->isSaturday()) ? 'bg-emerald-50/70 py-0.5 px-2 rounded-md -mx-1' : '' }}">
                                    <span class="font-medium {{ ($opStatus['isOpenToday'] && now('Asia/Jakarta')->isSaturday()) ? 'text-emerald-800 font-semibold' : 'text-gray-500' }}">Sabtu</span>
                                    <span class="font-semibold text-gray-800">08:00 - 14:00 WIB</span>
                                </li>
                                <li class="flex items-center justify-between {{ $opStatus['isHoliday'] ? 'bg-rose-50/70 py-0.5 px-2 rounded-md -mx-1' : '' }}">
                                    <span class="font-medium {{ $opStatus['isHoliday'] ? 'text-rose-700 font-semibold' : 'text-gray-500' }}">Minggu / Libur</span>
                                    <span class="font-semibold text-rose-600">Tutup</span>
                                </li>
                            </ul>
                        </div>

                        
                        <div class="space-y-2 pt-1">
                            <a href="https://www.google.com/maps/dir/?api=1&destination=-6.922729893076937,106.93068827499648"
                                target="_blank" rel="noopener noreferrer"
                                class="w-full flex items-center justify-center gap-2 py-2.5 px-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs sm:text-sm shadow-sm hover:shadow-blue-500/30 transition-all transform hover:-translate-y-0.5">
                                <i class="fa-solid fa-diamond-turn-right text-xs sm:text-sm"></i>
                                <span>Petunjuk Arah (Navigasi GPS)</span>
                            </a>
                            <a href="https://www.google.com/maps/search/?api=1&query=-6.922729893076937,106.93068827499648"
                                target="_blank" rel="noopener noreferrer"
                                class="w-full flex items-center justify-center gap-1.5 py-2 px-4 bg-white hover:bg-gray-50 text-gray-700 font-semibold rounded-xl text-xs border border-gray-200 shadow-xs transition-all hover:border-gray-300">
                                <i class="fa-solid fa-arrow-up-right-from-square text-[10px] text-blue-600"></i>
                                <span>Buka di Aplikasi Google Maps</span>
                            </a>
                        </div>
                    </div>

                    
                    <div class="lg:col-span-7 relative flex flex-col min-h-[320px] sm:min-h-[360px] lg:min-h-[380px]">
                        
                        <div class="absolute top-3 left-3 z-10 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded-xl shadow-xs border border-gray-100 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-lg bg-blue-600 text-white flex items-center justify-center text-[10px] shadow-xs">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-900 leading-tight">Sukarobot Cabang Sukabumi</p>
                                <p class="text-[10px] text-gray-500">Cikole, Kota Sukabumi</p>
                            </div>
                        </div>

                        
                        <div class="absolute top-3 right-3 z-10">
                            <a href="https://www.google.com/maps/search/?api=1&query=-6.597364105696696,106.76939929943386"
                                target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-white/95 hover:bg-white text-gray-700 hover:text-blue-600 rounded-lg shadow-xs text-[11px] font-semibold transition-all border border-gray-100"
                                title="Buka peta penuh di tab baru">
                                <i class="fa-solid fa-expand text-[10px]"></i>
                                <span class="hidden sm:inline">Perbesar</span>
                            </a>
                        </div>

                        
                        <iframe
                            id="gmap_canvas"
                            title="Peta Lokasi Sukarobot Cabang Sukabumi"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.730965411687!2d106.93068827499648!3d-6.922729893076937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68378a889fa131%3A0x255807915403ab50!2sSUKAROBOT%20ACADEMY!5e0!3m2!1sid!2sid!4v1791447270153!5m2!1sid!2sid"
                            class="w-full h-full flex-1 min-h-[320px] sm:min-h-[360px] lg:min-h-[380px] border-0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin">
                        </iframe>

                        
                        <div class="bg-white/95 backdrop-blur border-t border-gray-100 py-2 px-3.5 flex items-center justify-between text-[11px] text-gray-500">
                            <span class="inline-flex items-center gap-1.5">
                                <i class="fa-solid fa-circle-info text-blue-500 text-xs"></i>
                                <span>Gunakan dua jari atau kontrol peta untuk navigasi</span>
                            </span>
                            <a href="https://www.google.com/maps/dir/?api=1&destination=-6.922729893076937,106.93068827499648"
                                target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:text-blue-700 font-bold inline-flex items-center gap-1 text-[11px]">
                                <span>Rute Langsung</span>
                                <i class="fa-solid fa-arrow-right text-[9px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Berhasil mengirim pertanyaan',
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif

            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const nameInput = contactForm.querySelector('input[name="name"]');
                    const phoneInput = contactForm.querySelector('input[name="phone"]');
                    const messageInput = contactForm.querySelector('textarea[name="message"]');

                    const name = nameInput ? nameInput.value.trim() : '';
                    const phone = phoneInput ? phoneInput.value.trim() : '';
                    const message = messageInput ? messageInput.value.trim() : '';

                    if (!name || !phone || !message) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Mohon Lengkapi Data',
                            text: 'Semua kolom formulir wajib diisi sebelum mengirim pesan.',
                            confirmButtonColor: '#059669'
                        });
                        return;
                    }

                    const adminPhone = '6285795899901';
                    const text = `Halo Admin Sukarobot Cabang Sukabumi, saya ingin bertanya:\n\n*Nama:* ${name}\n*No. HP:* ${phone}\n*Pertanyaan:*\n${message}`;
                    const waUrl = `https://wa.me/${adminPhone}?text=${encodeURIComponent(text)}`;

                    Swal.fire({
                        icon: 'success',
                        title: 'Membuka WhatsApp...',
                        text: 'Pesan Anda telah disiapkan dan akan dialihkan ke WhatsApp Admin Sukarobot Cabang Sukabumi.',
                        showConfirmButton: false,
                        timer: 1800
                    });

                    setTimeout(() => {
                        window.open(waUrl, '_blank');
                    }, 600);
                });
            }
        });
    </script>

    <script src="{{ asset('assets/elearning/client/js/home.js') }}"></script>

@endsection
