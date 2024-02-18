<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Komentar;
use App\Models\Like;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function preview($id)
    {
        $data = Foto::with('user', 'comments')->find($id);
        $userId = $data->user->username;
        $isLiked = $data->likes->contains('user_id', auth()->id());

        return view('page.upload.detail.preview', compact('data', 'userId', 'isLiked'));
    }

    public function toggleLike(Request $request, $foto_id)
    {
        $like = Like::where('foto_id', $foto_id)->where('user_id', auth()->id())->first();

        if ($like) {
            $like->delete();
            return response()->json(['message' => 'Unlike berhasil'], 200);
        } else {
            Like::create([
                'foto_id' => $foto_id,
                'user_id' => auth()->id(),
            ]);
            return response()->json(['message' => 'Like berhasil'], 200);
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
}
