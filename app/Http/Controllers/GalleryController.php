<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman galeri.
     */
    public function index()
    {
        // Ambil data galeri dari database
        $galleries = Gallery::where('is_published', true) // Hanya yang statusnya published
                           ->orderBy('order_column', 'asc') // Urutkan sesuai urutan yang di-set di admin
                           ->get();

        // Kirim data ke view. Ganti 'gallery-page' jika nama file view Anda berbeda.
        return view('pages.gallery', ['galleryImages' => $galleries]);
    }
}