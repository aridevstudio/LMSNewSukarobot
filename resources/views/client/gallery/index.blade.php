@extends('client.main')

@section('body')

<main class="max-w-7xl mx-auto px-4 sm:px-6 pt-24 sm:pt-28 pb-16">

    <section class="mb-6">
        <nav class="flex items-center gap-2 text-xs sm:text-sm text-gray-500 mb-3">
            <a href="{{ url('/') }}" class="hover:text-blue-600 transition-colors">Home</a>
            <span class="text-gray-300">/</span>
            <span class="text-blue-600 font-semibold">Galeri</span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 sm:gap-6 pb-5 border-b border-gray-100">
            <div>
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-semibold mb-2">
                    <i class="fa-solid fa-camera text-blue-500"></i>
                    <span>Dokumentasi Sukarobot Academy</span>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Galeri & Dokumentasi Kegiatan
                </h1>
                <p class="text-gray-600 mt-2 max-w-2xl text-xs sm:text-sm leading-relaxed">
                    Koleksi lengkap foto aktivitas belajar robotika, pelatihan coding anak & remaja, kompetisi inovasi, serta fasilitas studio belajar Sukarobot Academy.
                </p>
            </div>

            <div class="flex items-center gap-3 bg-slate-50 border border-slate-100 px-4 py-2.5 rounded-xl self-start lg:self-auto">
                <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold text-base shadow-sm shadow-blue-500/20">
                    <i class="fa-solid fa-images text-sm"></i>
                </div>
                <div>
                    <p class="text-[11px] text-gray-500 font-medium">Total Dokumentasi</p>
                    <p class="text-base font-extrabold text-gray-900" id="total-photos-count">{{ $allGalleries->count() }} Foto</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-6">
        @php
            $currentCatSlug = Str::slug($selectedCategory ?? 'all');
        @endphp
        <div class="flex flex-wrap items-center gap-2 sm:gap-2.5" id="gallery-category-tabs">
            <button type="button" data-filter="all"
                class="category-tab-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 {{ ($currentCatSlug === 'all' || empty($selectedCategory)) ? 'bg-blue-600 text-white shadow-md shadow-blue-500/25 active' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 hover:text-gray-900' }}">
                Semua Kategori ({{ $allGalleries->count() }})
            </button>
            @foreach($categories as $cat)
                @php
                    $catSlug = Str::slug($cat);
                    $count = $allGalleries->where('category', $cat)->count();
                    $isActive = ($currentCatSlug === $catSlug || strtolower($selectedCategory ?? '') === strtolower($cat));
                @endphp
                <button type="button" data-filter="{{ $catSlug }}"
                    class="category-tab-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-all duration-300 {{ $isActive ? 'bg-blue-600 text-white shadow-md shadow-blue-500/25 active' : 'bg-gray-100 text-gray-600 hover:bg-gray-200 hover:text-gray-900' }}">
                    {{ $cat }} ({{ $count }})
                </button>
            @endforeach
        </div>
    </section>

    <section>
        @if($allGalleries->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="gallery-items-grid">
                @foreach($allGalleries as $index => $item)
                    @php
                        $catSlug = Str::slug($item->category ?? 'kegiatan');
                    @endphp
                    <div class="gallery-photo-card group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl border border-gray-100 transition-all duration-300 hover:-translate-y-1.5 cursor-pointer flex flex-col"
                         data-category="{{ $catSlug }}"
                         data-index="{{ $index }}"
                         onclick="openDetailModal({{ $index }})">
                        
                        <div class="aspect-[4/3] w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                 loading="lazy">

                            <div class="absolute inset-0 bg-gradient-to-t from-gray-950/80 via-gray-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                <span class="text-white text-xs font-medium line-clamp-2">
                                    {{ $item->description ?: 'Klik untuk melihat foto resolusi penuh' }}
                                </span>
                                <div class="mt-2 flex items-center gap-1.5 text-blue-300 text-xs font-semibold">
                                    <i class="fa-solid fa-expand text-[11px]"></i>
                                    <span>Lihat Foto Penuh</span>
                                </div>
                            </div>

                            <div class="absolute top-3 left-3 z-10">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-white/90 backdrop-blur-md text-gray-800 shadow-sm border border-white/60">
                                    {{ $item->category ?? 'Kegiatan' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">
                                    {{ $item->title }}
                                </h3>
                                @if($item->description)
                                    <p class="text-gray-500 text-xs mt-1.5 line-clamp-2 leading-relaxed">
                                        {{ $item->description }}
                                    </p>
                                @endif
                            </div>
                            <div class="pt-3 mt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock text-[10px]"></i>
                                    {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                                </span>
                                <span class="text-blue-600 font-semibold group-hover:translate-x-0.5 transition-transform">
                                    Perbesar &rarr;
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="no-filter-results" class="hidden text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                <i class="fa-regular fa-images text-4xl text-gray-400 mb-3"></i>
                <h3 class="text-base font-bold text-gray-700">Tidak ada foto di kategori ini</h3>
                <p class="text-gray-500 text-xs mt-1">Silakan pilih kategori lainnya untuk melihat dokumentasi.</p>
            </div>
        @else
            
            <div class="text-center py-20 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl">
                    <i class="fa-regular fa-images"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Belum Ada Dokumentasi Foto</h3>
                <p class="text-gray-500 text-sm mt-1 max-w-md mx-auto">
                    Foto kegiatan belajar dan workshop akan segera diunggah oleh admin.
                </p>
            </div>
        @endif
    </section>

</main>


<div id="lightboxModal" class="fixed inset-0 z-50 hidden bg-black/85 backdrop-blur-md flex items-center justify-center p-4 transition-all duration-300 opacity-0"
     onclick="closeDetailModal()">
    <div class="relative bg-white rounded-2xl max-w-4xl w-full overflow-hidden shadow-2xl transform scale-95 transition-transform duration-300 flex flex-col max-h-[92vh]"
         onclick="event.stopPropagation()">
        
        
        <div class="flex items-center justify-between px-5 py-3.5 border-b border-gray-100 bg-white">
            <div class="flex items-center gap-2">
                <span id="modalCategory" class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100"></span>
                <span id="modalDate" class="text-xs text-gray-400 flex items-center gap-1"></span>
            </div>
            <button type="button" onclick="closeDetailModal()"
                    class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 flex items-center justify-center transition-colors">
                <i class="fa-solid fa-xmark text-base"></i>
            </button>
        </div>

        
        <div class="relative w-full bg-black/95 flex items-center justify-center min-h-[300px] max-h-[60vh] overflow-hidden">
            <img id="modalImg" src="" alt="" class="w-full h-full max-h-[60vh] object-contain">

            
            <button type="button" id="prevBtn" onclick="navigatePhoto(-1)"
                    class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/50 hover:bg-black/80 text-white flex items-center justify-center transition-colors">
                <i class="fa-solid fa-chevron-left text-sm"></i>
            </button>
            <button type="button" id="nextBtn" onclick="navigatePhoto(1)"
                    class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/50 hover:bg-black/80 text-white flex items-center justify-center transition-colors">
                <i class="fa-solid fa-chevron-right text-sm"></i>
            </button>
        </div>

        
        <div class="p-5 bg-white overflow-y-auto">
            <h3 id="modalTitle" class="text-xl font-extrabold text-gray-900 leading-tight"></h3>
            <p id="modalDesc" class="text-sm text-gray-600 mt-2 leading-relaxed"></p>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>

    const galleryItems = @json($galleryItems);

    let currentPhotoIndex = 0;
    let visibleIndices = [];

    function updateVisibleIndices(filter) {
        visibleIndices = [];
        const cards = document.querySelectorAll('.gallery-photo-card');
        let visibleCount = 0;

        cards.forEach((card, idx) => {
            const cardCat = card.getAttribute('data-category');
            if (filter === 'all' || cardCat === filter) {
                card.style.display = '';
                visibleIndices.push(idx);
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        const noResult = document.getElementById('no-filter-results');
        if (noResult) {
            noResult.classList.toggle('hidden', visibleCount > 0);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const tabBtns = document.querySelectorAll('.category-tab-btn');

        const activeTab = document.querySelector('.category-tab-btn.active');
        const initialFilter = activeTab ? activeTab.getAttribute('data-filter') : 'all';
        updateVisibleIndices(initialFilter);

        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                tabBtns.forEach(b => {
                    b.classList.remove('active', 'bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-500/25');
                    b.classList.add('bg-gray-100', 'text-gray-600');
                });
                this.classList.add('active', 'bg-blue-600', 'text-white', 'shadow-lg', 'shadow-blue-500/25');
                this.classList.remove('bg-gray-100', 'text-gray-600');

                const filter = this.getAttribute('data-filter');
                updateVisibleIndices(filter);

                const newUrl = new URL(window.location);
                if (filter === 'all') {
                    newUrl.searchParams.delete('kategori');
                } else {
                    newUrl.searchParams.set('kategori', filter);
                }
                window.history.replaceState({}, '', newUrl);
            });
        });
    });

    window.openDetailModal = function(index) {
        if (!galleryItems || galleryItems.length === 0) return;
        currentPhotoIndex = index;
        renderModalContent();

        const modal = document.getElementById('lightboxModal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            const box = modal.querySelector('div');
            if (box) {
                box.classList.remove('scale-95');
                box.classList.add('scale-100');
            }
        }, 15);
        document.body.style.overflow = 'hidden';
    };

    function renderModalContent() {
        const item = galleryItems[currentPhotoIndex];
        if (!item) return;

        document.getElementById('modalImg').src = item.image;
        document.getElementById('modalTitle').textContent = item.title;
        document.getElementById('modalCategory').textContent = item.category;
        document.getElementById('modalDate').innerHTML = `<i class="fa-regular fa-clock text-[10px]"></i> ${item.date}`;
        document.getElementById('modalDesc').textContent = item.description || 'Tidak ada deskripsi tambahan.';

        document.getElementById('prevBtn').style.display = (visibleIndices.length > 1) ? 'flex' : 'none';
        document.getElementById('nextBtn').style.display = (visibleIndices.length > 1) ? 'flex' : 'none';
    }

    window.navigatePhoto = function(direction) {
        if (visibleIndices.length <= 1) return;
        let pos = visibleIndices.indexOf(currentPhotoIndex);
        if (pos === -1) pos = 0;

        let newPos = pos + direction;
        if (newPos < 0) newPos = visibleIndices.length - 1;
        if (newPos >= visibleIndices.length) newPos = 0;

        currentPhotoIndex = visibleIndices[newPos];
        renderModalContent();
    };

    window.closeDetailModal = function() {
        const modal = document.getElementById('lightboxModal');
        if (!modal) return;

        modal.classList.add('opacity-0');
        const box = modal.querySelector('div');
        if (box) {
            box.classList.remove('scale-100');
            box.classList.add('scale-95');
        }
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 300);
    };

    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('lightboxModal');
        if (!modal || modal.classList.contains('hidden')) return;

        if (e.key === 'Escape') closeDetailModal();
        if (e.key === 'ArrowLeft') navigatePhoto(-1);
        if (e.key === 'ArrowRight') navigatePhoto(1);
    });
</script>
@endsection
