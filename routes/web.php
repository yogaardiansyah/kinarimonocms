    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\JFestController;
    use App\Http\Controllers\ArticleController;
    use App\Http\Controllers\GalleryController;
    use App\Http\Controllers\CommunityApplicationController;
    use App\Http\Controllers\ContactMessageController;
    
    Route::get('/', function () {
        // Ini memberitahu Laravel untuk merender file 'home.blade.php'
        return view('pages.home'); 
    })->name('pages.home');

    Route::get('/jadwal-event', JFestController::class)->name('pages.jadwal-event');

    Route::get('/liputan-kami', function () {
        // Ini memberitahu Laravel untuk merender file 'home.blade.php'
        return view('pages.liputan-kami'); 
    })->name('pages.liputan-kami');

    Route::get('/kontak', function () {
        // Ini memberitahu Laravel untuk merender file 'home.blade.php'
        return view('pages.kontak'); 
    })->name('pages.kontak');

    Route::get('/tentang-kami', function () {
        // Ini memberitahu Laravel untuk merender file 'home.blade.php'
        return view('pages.tentang-kami'); 
    })->name('pages.tentang-kami');

    Route::get('/prinsip-komunitas', function () {
        // Ini memberitahu Laravel untuk merender file 'home.blade.php'
        return view('pages.prinsip-komunitas'); 
    });

    // 1. Halaman Indeks/Hub untuk semua kebijakan
    Route::get('/pusat-kebijakan', function () {
        return view('pages.legal.pusat-kebijakan');
    })->name('pages.legal.pusat-kebijakan');

    // 2. Halaman Syarat Layanan & Kebijakan Privasi
    Route::get('/syarat-ketentuan', function () {
        return view('pages.legal.syarat-ketentuan');
    })->name('pages.legal.syarat-ketentuan');

    // 3. Halaman Kebijakan Hak Cipta & Penggunaan Aset
    Route::get('/kebijakan-hak-cipta', function () {
        return view('pages.legal.kebijakan-hak-cipta');
    })->name('pages.legal.kebijakan-hak-cipta');

    // 4. Halaman Kebijakan Penurunan Konten (Takedown)
    Route::get('/penurunan-konten', function () {
        return view('pages.legal.penurunan-konten');
    })->name('pages.legal.penurunan-konten');

    // 5. Halaman Pelaporan Anggota Bermasalah & Moderasi Komunitas
    Route::get('/pelaporan-komunitas', function () {
        return view('pages.legal.pelaporan-komunitas');
    })->name('pages.legal.pelaporan-komunitas');

    // 6. Halaman Prinsip Komunitas Internal
    Route::get('/prinsip-komunitas', function () {
        // Pastikan path view ini benar sesuai struktur folder Anda
        return view('pages.prinsip-komunitas'); 
    })->name('pages.prinsip-komunitas');

    Route::get('/galeri', [GalleryController::class, 'index'])->name('pages.gallery');

    Route::post('/community/apply', [CommunityApplicationController::class, 'store'])->name('community.apply');
Route::post('/contact/submit', [ContactMessageController::class, 'store'])->name('contact.submit');

//     // 1. Halaman Artikel / Blog
// // Untuk menampilkan daftar semua artikel
// Route::get('/artikel', [ArticleController::class, 'index'])->name('pages.articles.index');
// // Untuk menampilkan satu artikel spesifik berdasarkan slug-nya
// Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('pages.articles.show');

// // 2. Halaman Sorotan Kreator (Creator Spotlight)
// // Untuk menampilkan daftar semua kreator yang pernah disorot
// Route::get('/kreator', [CreatorController::class, 'index'])->name('pages.creators.index');
// // Untuk menampilkan profil satu kreator spesifik
// Route::get('/kreator/{username}', [CreatorController::class, 'show'])->name('pages.creators.show');

// // 3. Halaman Direktori Komunitas
// // Untuk menampilkan direktori utama yang bisa difilter
// Route::get('/direktori', [DirectoryController::class, 'index'])->name('pages.directory');

// // 4. Halaman Kemitraan Media (Media Partnership)
// // Halaman statis yang menjelaskan layanan, bisa menggunakan closure atau controller
// Route::get('/kerjasama-media', function() {
//     return view('pages.partnership');
// })->name('pages.partnership');