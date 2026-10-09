<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        SEOTools::setTitle('Home');
        SEOTools::setDescription('Platform Belajar Robotika dan Coding Terbaik di Indonesia. Tingkatkan kompetensi Anda di berbagai bidang bersama para ahli.');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@sukarobot');

        // Get popular programs (top rated and most enrolled)
        $popularPrograms = DB::table('data_programs')
            ->leftJoin('data_trainers', 'data_programs.instructor_id', '=', 'data_trainers.id')
            ->select(
                'data_programs.*',
                'data_trainers.nama as instructor_name'
            )
            ->where('data_programs.status', 'published')
            // ->where('data_programs.start_date', '>', now()) // Removed to show all programs
            ->orderBy('data_programs.rating', 'desc')
            ->orderBy('data_programs.enrolled_count', 'desc')
            ->limit(8)
            ->get();

        // Get instructors for home page (top rated by experience limit 6)
        $instructors = DB::table('data_trainers')
            ->join('users', function($join) {
                $join->on('users.email', '=', DB::raw('data_trainers.email COLLATE utf8mb4_unicode_ci'));
            })
            ->select(
                'users.name as nama',
                'users.avatar',
                'users.job as jabatan',
                'data_trainers.pengalaman',
                'data_trainers.keahlian',
                'data_trainers.bio as deskripsi',
                'data_trainers.foto'
            )
            ->where('data_trainers.status_trainer', 'Aktif')
            ->orderBy('data_trainers.pengalaman', 'desc')
            ->limit(6)
            ->get()
            ->map(function ($instructor) {
                // Determine photo to use: instructor-specific photo > user avatar > default
                $defaultAvatar = asset('assets/elearning/client/img/default-avatar.jpeg');
                $photo = $defaultAvatar;

                // Check Instructor specific photo
                if ($instructor->foto) {
                     if (filter_var($instructor->foto, FILTER_VALIDATE_URL)) {
                         $photo = $instructor->foto;
                     } elseif (file_exists(public_path($instructor->foto))) {
                         $photo = asset($instructor->foto);
                     } elseif (file_exists(storage_path('app/public/' . $instructor->foto))) {
                         $photo = asset('storage/' . $instructor->foto);
                     }
                } 
                
                // Fallback to User avatar if instructor photo not valid/set
                if ($photo === $defaultAvatar && $instructor->avatar) {
                    if (filter_var($instructor->avatar, FILTER_VALIDATE_URL)) {
                        $photo = $instructor->avatar;
                    } else {
                        if (file_exists(public_path($instructor->avatar))) {
                             $photo = asset($instructor->avatar);
                        } elseif (file_exists(public_path('storage/' . $instructor->avatar))) {
                             $photo = asset('storage/' . $instructor->avatar);
                        } elseif (file_exists(storage_path('app/public/' . $instructor->avatar))) {
                             $photo = asset('storage/' . $instructor->avatar);
                        }
                    }
                }

                return (object) [ // Return as object to match blade syntax
                    'foto' => $photo,
                    'nama' => $instructor->nama,
                    'jabatan' => $instructor->jabatan ?? 'Instructor',
                    'pengalaman' => $instructor->pengalaman ?? '-',
                    'keahlian' => $instructor->keahlian ?? 'General',
                    'deskripsi' => $instructor->deskripsi ?? '-',
                ];
            });

        // Transform programs data
        $popularPrograms = $popularPrograms->map(function ($program) {
            $program->tools = json_decode($program->tools, true) ?? [];
            $program->learning_materials = json_decode($program->learning_materials, true) ?? [];
            $program->benefits = json_decode($program->benefits, true) ?? [];
            $program->available_slots = max(0, (int)($program->quota ?? 0) - (int)($program->enrolled_count ?? 0));
            return $program;
        });

        // Get active promo for popup overlay
        $activePromo = DB::table('promos')
            ->where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->first();

        // Status jam operasional & hari libur cabang Sukabumi
        $operationalStatus = \App\Services\OperationalScheduleService::getStatus();

        // Get active galleries for home page: 1 foto terbaru per kategori
        // Urutan statis untuk 4 kategori utama, kategori baru otomatis di belakang
        $baseCategories = ['Kursus', 'Pelatihan', 'Go to School', 'Holiday Program'];
        $additionalCategories = \App\Models\Gallery::active()
            ->whereNotIn('category', $baseCategories)
            ->orderBy('id', 'asc')
            ->pluck('category')
            ->unique()
            ->values();

        $allCategories = collect($baseCategories)->merge($additionalCategories);

        $galleries = collect();
        foreach ($allCategories as $cat) {
            $latest = \App\Models\Gallery::active()
                ->where(function ($q) use ($cat) {
                    $q->where('category', $cat)
                      ->orWhereRaw('LOWER(REPLACE(category, "-", " ")) = ?', [strtolower(str_replace('-', ' ', $cat))]);
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->first();

            if ($latest) {
                $galleries->push($latest);
            }
        }

        return view('client.home', compact('popularPrograms', 'instructors', 'galleries', 'activePromo', 'operationalStatus'));
    }

    /**
     * Handle contact form submission
     */
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        $adminPhone = '6285795899901';
        $text = "Halo Admin Sukarobot Cabang Sukabumi, saya ingin bertanya:\n\n*Nama:* {$request->name}\n*No. HP:* {$request->phone}\n*Pertanyaan:*\n{$request->message}";

        return redirect()->away('https://wa.me/' . $adminPhone . '?text=' . urlencode($text));
    }
}
