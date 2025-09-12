{{-- Path: resources/views/filament/login_extra.blade.php --}}
<style>
    body {
        background-image: url("{{ asset('images/background.jpg') }}") !important;
        background-size: cover !important;
        background-position: center !important;
        background-attachment: fixed !important;
        background-image: none;
        margin: 0;
    }

    @media screen and (min-width: 1024px) {
        
        /* Kolom kiri: maskot Kirara - diperkecil dan digeser kekanan */
        body::before {
            content: '';
            position: fixed;
            top: 95%;
            left: -22%; /* Geser kekanan dari 0 ke 15% */
            width: 75%; /* Diperkecil dari 30% ke 25% */
            height: 100%; /* Set height untuk menampilkan full image tapi lebih kecil */
            transform: translateY(-50%); /* Center vertikal */
            z-index: 0;
            background-image: url("{{ asset('images/kirara_ai.webp') }}");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.9;
        }

        .fi-logo { 
            display: none; 
        }

        /* Kolom kanan: form */
        main {
            position: fixed;
            top: 50%;
            right: 7%;
            width: 100%;
            transform: translateY(-50%);
            z-index: 1;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            background-color: rgba(255, 255, 255, 0.2) !important;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            padding: 2em;
            border-radius: 8px;
        }

        /* Teks Selamat Datang - diletakkan di atas form main */
        main::before {
            content: 'Welcome to CMS';
            display: block;
            text-align: center;
            font-size: 2em; /* Diperbesar sedikit */
            font-weight: bold;
            color: #ffffffff;
            margin-bottom: 1.5em; /* Beri jarak lebih dari form */
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Tambah text shadow untuk keterbacaan */
        }

        form .filament-form-header {
            text-align: center;
            color: #ffffffff;
        }
    }
</style>