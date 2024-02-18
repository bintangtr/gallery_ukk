<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Komentar;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PreviewController extends Controller
{
    public function preview($id)
    {
        $data = Foto::with('user', 'comments')->find($id);
        $userId = $data->user->username;
        $isLiked = $data->likes->contains('user_id', auth()->id());
        $like = Like::where('foto_id', $id)->get();

        return view('page.upload.detail.preview', compact('data', 'userId', 'isLiked', 'like'));
    }

    public function toggleLike(Request $request, $foto_id)
    {
        $like = Like::where('foto_id', $foto_id)->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
            return redirect("/preview/" . $foto_id);
        } else {
            Like::create([
                'foto_id' => $foto_id,
                'user_id' => auth()->id(),
                'tanggal_like' => now(),
            ]);
            return redirect("/preview/" . $foto_id);
        }
    }

    public function storeKomentar(Request $request, $id)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:255',
        ]);

        Komentar::create([
            'foto_id' => $id,
            'user_id' => auth()->id(),
            'isi_komentar' => $request->isi_komentar,
            'tanggal_komentar' => now(),
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function delete(Foto $data)
    {
        if ($data->user_id == auth()->id()) {
            $data->delete();
            return redirect('/')->with('success', 'Foto berhasil dihapus');
        } else {
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk menghapus foto ini');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_foto' => 'required|string|max:255',
            'deskripsi_foto' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1080', // Validasi untuk unggahan foto
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $foto = Foto::findOrFail($id);

        // Proses update atribut foto
        $foto->judul_foto = $request->judul_foto;
        $foto->deskripsi_foto = $request->deskripsi_foto;
        // Update atribut lainnya

        // Periksa apakah ada unggahan foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($foto->lokasi_file) {
                Storage::delete($foto->lokasi_file);
            }
            // Simpan foto baru
            $foto->lokasi_file = $request->file('foto')->store('foto', 'public');
        }

        $foto->save();

        return redirect()->route('page.upload.detail.preview', $id)->with('success', 'Foto berhasil diperbarui');
    }
}
