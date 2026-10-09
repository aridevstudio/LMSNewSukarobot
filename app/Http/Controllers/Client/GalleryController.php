<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOTools;

class GalleryController extends Controller
{
    /**
     * Display a listing of all gallery photos.
     */
    public function index(Request $request)
    {
        SEOTools::setTitle('Galeri & Dokumentasi Kegiatan');
        SEOTools::setDescription('Dokumentasi lengkap aktivitas belajar, workshop coding & robotika, kompetisi, dan fasilitas Sukarobot Cabang Sukabumi.');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@sukarobot');

        // Ambil semua kategori unik dari foto yang aktif
        $categories = Gallery::active()
            ->pluck('category')
            ->filter()
            ->unique()
            ->values();

        $selectedCategory = $request->query('kategori');

        // Query foto galeri
        $allGalleries = Gallery::active()
            ->orderBy('order_index', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Format data galeri untuk modal lightbox
        $galleryItems = $allGalleries->map(function ($g) {
            return [
                'id' => $g->id,
                'title' => $g->title,
                'image' => asset($g->image),
                'category' => $g->category ?? 'Kegiatan',
                'category_slug' => Str::slug($g->category ?? 'kegiatan'),
                'description' => $g->description ?? '',
                'date' => \Carbon\Carbon::parse($g->created_at)->translatedFormat('d M Y'),
            ];
        });

        return view('client.gallery.index', compact('allGalleries', 'categories', 'selectedCategory', 'galleryItems'));
    }
}
