let instructorsPerPage = 8;
let currentPage = 1;
let selectedKeahlian = 'all';

const filteredInstructors = () => selectedKeahlian === 'all'
    ? instructors
    : instructors.filter(i => i.keahlian === selectedKeahlian);
const totalPages = () => Math.ceil(filteredInstructors().length / instructorsPerPage);

function renderPage(page) {
    const grid = document.getElementById('instructorGrid');
    grid.innerHTML = '';
    const start = (page - 1) * instructorsPerPage;
    const pageInstructors = filteredInstructors().slice(start, start + instructorsPerPage);

    pageInstructors.forEach(inst => {
        const card = document.createElement('div');
        card.className = 'h-full';
        card.innerHTML = `
            <article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg sm:p-6">
                <div class="flex items-center gap-4">
                    <img src="${inst.foto}" alt="${inst.nama}" class="h-20 w-20 shrink-0 rounded-2xl bg-blue-50 object-cover ring-4 ring-blue-50">
                    <div class="min-w-0 flex-1">
                        <span class="mb-1 inline-flex rounded-full bg-orange-50 px-2.5 py-1 text-[11px] font-bold text-orange-700">${inst.keahlian}</span>
                        <h3 class="truncate text-lg font-bold text-gray-900">${inst.nama}</h3>
                        <p class="truncate text-sm font-medium text-blue-600">${inst.jabatan}</p>
                    </div>
                </div>
                <p class="mt-5 line-clamp-3 min-h-[4.5rem] text-sm leading-relaxed text-gray-600">${inst.deskripsi}</p>
                <div class="mt-5 flex items-center justify-between gap-3 border-t border-gray-100 pt-4">
                    <span class="inline-flex min-w-0 items-center gap-2 text-xs font-medium text-gray-500"><i class="fa-solid fa-briefcase text-blue-500"></i><span class="truncate">${inst.pengalaman}</span></span>
                    <button type="button" class="viewProfileBtn inline-flex shrink-0 items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">Lihat Profil</button>
                </div>
            </article>`;
        grid.appendChild(card);
        card.querySelector('.viewProfileBtn').addEventListener('click', () => showModal(inst));
    });
    renderPagination();
}

function renderPagination() {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';
    for (let i = 1; i <= totalPages(); i++) {
        const btn = document.createElement('button');
        btn.className = `w-10 h-10 rounded-xl text-sm font-bold transition-all flex items-center justify-center ${i === currentPage
            ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30'
            : 'bg-white text-gray-600 border border-gray-200 hover:border-blue-400 hover:text-blue-600'}`;
        btn.innerText = i;
        btn.onclick = () => { currentPage = i; renderPage(i); };
        pagination.appendChild(btn);
    }
}

const keahlianFilter = document.getElementById('keahlianFilter');
const keahlianList = [...new Set(instructors.map(instructor => instructor.keahlian).filter(Boolean))]
    .sort((first, second) => first.localeCompare(second, 'id'));

keahlianList.forEach(keahlian => {
    const option = document.createElement('option');
    option.value = keahlian;
    option.textContent = keahlian;
    keahlianFilter.appendChild(option);
});

keahlianFilter.addEventListener('change', event => {
    selectedKeahlian = event.target.value;
    currentPage = 1;
    renderPage(currentPage);
});

renderPage(1);

(function handleHighlight() {
    const highlightName = new URLSearchParams(window.location.search).get('highlight');
    if (!highlightName) return;
    const idx = instructors.findIndex(i => i.nama.toLowerCase() === decodeURIComponent(highlightName).toLowerCase());
    if (idx === -1) return;

    const targetPage = Math.floor(idx / instructorsPerPage) + 1;
    currentPage = targetPage;
    renderPage(targetPage);

    requestAnimationFrame(() => setTimeout(() => {
        const cards = document.getElementById('instructorGrid').querySelectorAll(':scope > div');
        const targetCard = cards[idx - (targetPage - 1) * instructorsPerPage];
        if (!targetCard) return;
        targetCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
        targetCard.style.boxShadow = '0 0 0 3px #3b82f6, 0 0 24px rgba(59, 130, 246, 0.35)';
        targetCard.style.transform = 'scale(1.03)';
        setTimeout(() => showModal(instructors[idx]), 800);
        setTimeout(() => { targetCard.style.boxShadow = ''; targetCard.style.transform = ''; }, 3000);
        window.history.replaceState({}, '', window.location.pathname);
    }, 150));
})();

const modalBg = document.getElementById('modalBg');
const modalBody = document.getElementById('modalBody');
const modalImage = document.getElementById('modalImage');
const modalClose = document.getElementById('modalClose');
let previouslyFocusedElement = null;

function showModal(inst) {
    previouslyFocusedElement = document.activeElement;
    modalImage.src = inst.foto;
    modalImage.alt = inst.nama;
    modalBody.innerHTML = `
        <div class="mb-4">
            <span class="inline-block bg-blue-50 text-blue-600 text-xs font-bold px-2.5 py-1 rounded-full mb-2 border border-blue-100">${inst.keahlian}</span>
            <h2 id="modalInstructorName" class="text-2xl font-bold text-gray-900">${inst.nama}</h2>
            <p class="text-blue-600 font-medium">${inst.jabatan}</p>
        </div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-4 bg-gray-50 p-3 rounded-xl">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            <span class="font-semibold">Pengalaman: ${inst.pengalaman}</span>
        </div>
        <p class="text-gray-700 leading-relaxed">${inst.deskripsi}</p>`;
    modalBody.scrollTop = 0;
    document.documentElement.classList.add('overflow-hidden');
    modalBg.classList.remove('hidden');
    modalClose.focus();
}

modalClose.addEventListener('click', closeModal);
modalBg.addEventListener('click', e => { if (e.target === modalBg) closeModal(); });
document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && !modalBg.classList.contains('hidden')) closeModal();
});

function closeModal() {
    modalBg.classList.add('hidden');
    document.documentElement.classList.remove('overflow-hidden');
    previouslyFocusedElement?.focus();
}
