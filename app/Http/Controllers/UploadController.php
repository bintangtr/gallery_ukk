<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function upload()
    {
        return view("page.upload.upload");
    }
    public function proses_upload(Request $request)
    {
        $request->validate([
            'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:1080',
            'judul_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'nullable|string',
        ]);

        // Simpan file ke storage
        $filePath = $request->file('lokasi_file')->store('photos', 'public');

        Foto::create([
            'user_id' => Auth::id(),
            'judul_foto' => $request->judul_foto,
            'deskripsi_foto' => $request->deskripsi_foto,
            'lokasi_file' => $filePath, // Kolom lokasi_file untuk menyimpan path file foto
            'tanggal_unggah' => now(),
        ]);

        return redirect()->back()->with('success', 'Foto berhasil diunggah.');
    }
}
