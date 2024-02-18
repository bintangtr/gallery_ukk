<?php

namespace App\Livewire;

use App\Models\Foto as FotoModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.upload');
    }

    // public function upload()
    // {
    //     $this->validate([
    //         'lokasi_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'judul_foto' => 'required|string|max:255',
    //         'deskripsi_foto' => 'nullable|string',
    //     ]);

    //     $filePath = $this->foto->store('images', 'public');

    //     FotoModel::create([
    //         'user_id' => auth()->id(), // jika menggunakan otentikasi pengguna
    //         'judul_foto' => $this->judul_foto,
    //         'deskripsi_foto' => $this->deskripsi_foto,
    //         'lokasi_file' => $filePath,
    //         'tanggal_unggah' => now(),
    //     ]);

    //     session()->flash('success', 'Foto berhasil diunggah.');

    //     $this->reset(['foto', 'judul_foto', 'deskripsi_foto']);
    // }
}
