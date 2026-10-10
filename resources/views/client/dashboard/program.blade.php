<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/elearning/client/js/dashboard/program.js') }}"></script>

@extends('client.layouts.dashboard')

@section('dashboard-content')
    
    <section id="program" class="section">
      <h2 class="text-2xl font-bold text-blue-700 mb-4">Program Saya</h2>
      @if($trainingBookings->isNotEmpty())
        <div class="mb-6 space-y-3">
          <h3 class="text-lg font-semibold text-gray-800">Pengajuan Pelatihan</h3>
          @foreach($trainingBookings as $booking)
            @php
              $paidTrainingTransaction = $booking->transactions->firstWhere('status', 'paid');
              $isRejected = $booking->schedule_status === 'rejected';
              $statusLabel = $booking->locked_at || $paidTrainingTransaction
                ? 'Terkunci / Lunas'
                : ($isRejected ? 'Pengajuan Ditolak' : ($booking->schedule_status === 'approved' ? 'Disetujui - Menunggu Pembayaran' : 'Menunggu Konfirmasi Admin'));
              $statusClass = $booking->locked_at || $paidTrainingTransaction
                ? 'bg-green-50 border-green-200 text-green-700'
                : ($isRejected ? 'bg-red-50 border-red-200 text-red-700' : ($booking->schedule_status === 'approved' ? 'bg-blue-50 border-blue-200 text-blue-700' : 'bg-yellow-50 border-yellow-200 text-yellow-700'));
            @endphp
            <div id="training-booking-{{ $booking->id }}" data-rejected-booking="{{ $isRejected ? $booking->id : '' }}" class="training-booking-card rounded-xl border {{ $statusClass }} p-4">
              <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div>
                  <p class="font-semibold">{{ $booking->program->program }}</p>
                  <p class="text-sm mt-1">
                    {{ $booking->dates->map(fn ($date) => $date->training_date->format('d M Y'))->join(', ') }}
                  </p>
                  <p class="text-sm mt-1">Total: Rp{{ number_format($booking->total_amount, 0, ',', '.') }}</p>
                  @if($isRejected)
                    <p class="mt-3 text-sm">
                      <span class="font-semibold">Pesan admin:</span>
                      {{ $booking->admin_notes ?: 'Admin belum menambahkan keterangan.' }}
                    </p>
                  @endif
                </div>
                <div class="flex flex-col items-stretch md:items-end gap-2">
                  <div class="flex items-center justify-between md:justify-end gap-3">
                    <span class="text-sm font-semibold">{{ $statusLabel }}</span>
                    @if($isRejected)
                      <button type="button" class="dismiss-training-booking text-red-700 hover:text-red-900 text-xl leading-none" data-booking-id="{{ $booking->id }}" aria-label="Tutup pesan penolakan">
                        &times;
                      </button>
                    @endif
                  </div>
                  @if($booking->schedule_status === 'approved' && !$paidTrainingTransaction)
                    <a href="{{ route('client.training-bookings.create', $booking->program->slug) }}" class="rounded-lg bg-orange-500 text-white px-4 py-2 text-center text-sm font-semibold hover:bg-orange-600">
                      Lanjutkan Pembayaran
                    </a>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
      <script>
        document.querySelectorAll('.dismiss-training-booking').forEach(button => {
          button.addEventListener('click', function () {
              const bookingId = this.dataset.bookingId;
              const card = document.getElementById('training-booking-' + bookingId);
              localStorage.setItem('dismissed-training-booking-' + bookingId, '1');
              if (card) card.remove();
          });
        });

        document.querySelectorAll('[data-rejected-booking]').forEach(card => {
            const bookingId = card.dataset.rejectedBooking;
            if (bookingId && localStorage.getItem('dismissed-training-booking-' + bookingId) === '1') {
                card.remove();
            }
        });
      </script>
      <div class="relative group mb-6 pr-12 lg:pr-0">
          
          <button id="scroll-left" class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white/80 backdrop-blur-sm shadow-md rounded-full p-1.5 text-gray-600 hover:text-blue-600 hidden md:hidden lg:hidden transition-opacity duration-300 opacity-0 pointer-events-none flex items-center justify-center" aria-label="Scroll Left">
              <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
          </button>

          
          <div id="program-nav" class="flex overflow-x-auto gap-2 scrollbar-hide snap-x">
              <button data-filter="Semua Program" class="filter-btn px-4 py-2 text-sm font-medium rounded-full bg-blue-500 text-white whitespace-nowrap snap-start shrink-0 transition-colors duration-200 cursor-pointer">Semua Program</button>
              <button data-filter="Kursus" class="filter-btn px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-100 hover:bg-gray-200 whitespace-nowrap snap-start shrink-0 transition-colors duration-200 cursor-pointer">Kursus</button>
              <button data-filter="Pelatihan" class="filter-btn px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-100 hover:bg-gray-200 whitespace-nowrap snap-start shrink-0 transition-colors duration-200 cursor-pointer">Pelatihan</button>
              <button data-filter="Go to School" class="filter-btn px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-100 hover:bg-gray-200 whitespace-nowrap snap-start shrink-0 transition-colors duration-200 cursor-pointer">Go to School</button>
              <button data-filter="Holiday Program" class="filter-btn px-4 py-2 text-sm font-medium rounded-full text-gray-700 bg-gray-100 hover:bg-gray-200 whitespace-nowrap snap-start shrink-0 transition-colors duration-200 cursor-pointer">Holiday Program</button>
          </div>

          
          <button id="scroll-right" class="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-10 w-10 bg-white/90 backdrop-blur-sm shadow-md rounded-full text-gray-600 hover:text-blue-600 lg:hidden flex items-center justify-center" aria-label="Scroll Right">
              <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
          </button>
      </div>

      <style>
          .scrollbar-hide::-webkit-scrollbar {
              display: none;
          }
          .scrollbar-hide {
              -ms-overflow-style: none;
              scrollbar-width: none;
          }
      </style>
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach($enrollments as $enrollment)
          <div class="program-card flex flex-col rounded-xl overflow-hidden shadow-sm bg-white border border-gray-200 hover:shadow-lg transition-shadow duration-300" data-category="{{ $enrollment->category }}">
            <div class="relative">
              @php
                  $enrollmentImageUrl = ($enrollment->image && str_starts_with($enrollment->image, 'images/'))
                      ? asset($enrollment->image) 
                      : ($enrollment->image ? asset('storage/' . $enrollment->image) : asset('assets/elearning/client/img/home1.jpeg'));
              @endphp
              <div class="w-full bg-center bg-no-repeat aspect-[16/9] bg-cover" 
                   data-alt="{{ $enrollment->program_name }}" 
                   style='background-image: url("{{ $enrollmentImageUrl }}");'>
              </div>
              <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 z-20">
                  {{ $enrollment->category }}
              </span>
            </div>
            <div class="flex flex-col p-5 gap-4 flex-1">
              <h2 class="text-gray-900 text-lg font-bold leading-tight tracking-[-0.015em]">{{ $enrollment->program_name }}</h2>
              <p class="text-gray-500 text-sm font-normal leading-normal">Dibeli pada: {{ \Carbon\Carbon::parse($enrollment->created_at)->translatedFormat('d M Y') }}</p>

              @if($enrollment->is_course_program)
                <div class="rounded-lg border border-blue-100 bg-blue-50 px-3 py-2">
                  <div class="flex items-center justify-between gap-3">
                    <p class="text-xs font-semibold text-blue-700">Status Kursus: {{ $enrollment->course_status_label }}</p>
                    <p class="text-xs font-semibold text-blue-700">{{ $enrollment->progress_percent }}%</p>
                  </div>
                  <p class="mt-1 text-xs text-blue-600">{{ $enrollment->completed_materials }}/{{ $enrollment->total_materials }} materi selesai</p>
                </div>
              @endif

              <div class="mt-auto space-y-3">
                  @if($enrollment->can_submit_proof)
                      <a href="{{ route('client.program.proof', $enrollment->slug) }}" class="flex w-full min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-blue-600 text-white text-sm font-medium leading-normal hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 shadow-md shadow-blue-500/20">
                        <span class="truncate">Kirim Bukti Program</span>
                      </a>
                  @endif

                  @if($enrollment->is_course_program && !$enrollment->is_course_completed)
                    <a href="{{ route('client.program.classroom', $enrollment->slug) }}" class="flex w-full min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-blue-600 text-white text-sm font-semibold leading-normal hover:bg-blue-700 transition-colors">
                      <span class="truncate">Lanjutkan Kursus</span>
                    </a>
                  @endif

                  
                  <a href="{{ route('client.program.detail', $enrollment->slug) }}" class="flex w-full min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-gray-100 text-gray-700 text-sm font-medium leading-normal hover:bg-gray-200 border border-gray-300 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <span class="truncate">Detail Program</span>
                  </a>
              </div>
            </div>
          </div>
        @endforeach
        
        <div id="no-program-message" class="col-span-1 lg:col-span-2 bg-white rounded-2xl p-12 text-center shadow-sm border border-gray-100 {{ $enrollments->isEmpty() ? '' : 'hidden' }}">
          <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada program</h3>
          <p class="text-gray-500 mb-8 max-w-sm mx-auto">Anda belum terdaftar di program apapun untuk kategori ini.</p>
          <a href="{{ route('client.program.semua-kelas') }}" class="inline-flex items-center justify-center bg-blue-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-blue-700 transition shadow-lg shadow-blue-600/20">
            Jelajahi Program
          </a>
        </div>
      </div>
      
    </section>
@endsection
