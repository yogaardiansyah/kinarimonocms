<?php

namespace App\Http\Controllers;

use App\Models\CommunityApplication;
use Illuminate\Http\Request;

class CommunityApplicationController extends Controller
{
    public function store(Request $request)
    {
        // Validasi tetap sama, Laravel otomatis mengirim respons JSON jika validasi gagal pada request AJAX
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'reason' => 'required|string|max:5000',
        ]);

        CommunityApplication::create([
            'name' => $validated['name'],
            'instagram' => $validated['instagram'],
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        $successMessage = 'Aplikasi kamu berhasil dikirim! Tim kami akan segera mereviewnya.';

        // [PERUBAHAN UTAMA] Cek apakah ini permintaan AJAX
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage
            ]);
        }

        // Fallback untuk non-AJAX request
        return redirect()->back()->with('success', $successMessage);
    }
}