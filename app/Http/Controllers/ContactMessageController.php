<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:10000',
        ]);

        ContactMessage::create($validated); // Status 'new' akan otomatis diisi oleh database

        $successMessage = 'Pesan Anda telah berhasil dikirim. Terima kasih!';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => $successMessage]);
        }

        return redirect()->back()->with('success', $successMessage);
    }
}