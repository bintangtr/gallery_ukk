@extends('layouts.app')
@section('title', 'Preview')
@section('content')

<div class="container text-center mt-6">
    <div class="row justify-content-center">
        <div class="col-5">
            <img class="card-img" src="{{ asset('storage/' . $data->lokasi_file) }}" alt="{{ $data->judul_foto }}"
                style="border-radius: 23px;">
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <span class="mx-1"> </span>
                        <p class="fw-semibold">{{ $userId }}</p>
                        <span class="mx-1"> </span>
                        <p class="fw-normal">{{ $data->tanggal_unggah }}</p>
                        <span class="mx-5"> </span>
                        @if (auth()->check() && $data->user_id == auth()->user()->id)
                            <!-- Tombol hapus hanya muncul jika pengguna saat ini adalah pemilik foto -->
                            <form action="{{ route('preview.delete', $data) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Hapus
                                </button>
                            </form>
                            <!-- Tombol untuk modal -->
                            <button type="button" class="btn btn-sm btn-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#updateModal">
                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Update
                            </button>
                        @endif
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <h5>{{ $data->judul_foto }}</h5>
                    </div>
                    <div class="d-flex justify-content-start ">
                        <h6>{{ $data->deskripsi_foto }}</h6>
                    </div>

                    <hr>
                    <p class="fw-medium">Komentar</p>
                    <div class="container text-start">
                        <div class="d-flex justify-content-start">
                            <div class="comments mt-3 mb-4">
                                @foreach ($data->comments as $comment)
                                    <div class="mb-2">
                                        <span class="fw-bold">{{ $comment->user->username }}</span>
                                        {{ $comment->isi_komentar }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-start">
                        @if ($like)
                            <div style="margin-top: -4">
                                {{ $like->count() }}
                            </div>
                        @else
                            0
                        @endif
                        <form action="{{ route('like.toggle', ['foto_id' => $data->foto_id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-xl bg-white" style="border: none;">
                                @if ($isLiked)
                                    <i class="fa-solid fa-heart text-danger"></i>
                                @else
                                    <i class="fa-regular fa-heart"></i>
                                @endif
                            </button>
                        </form>
                    </div>

                    <!-- Form untuk menambahkan komentar baru -->
                    <form action="{{ route('comment.add', $data->foto_id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="isi_komentar" class="form-control"
                                placeholder="Tambahkan komentar">
                            <button type="submit" class="btn btn-dark" id="button-addon2">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('page.upload.detail.update', $data->foto_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul_foto" class="form-label">Judul Foto</label>
                        <input type="text" class="form-control" id="judul_foto" name="judul_foto"
                            value="{{ $data->judul_foto }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_foto" class="form-label">Deskripsi Foto</label>
                        <textarea class="form-control" id="deskripsi_foto" name="deskripsi_foto"
                            rows="3">{{ $data->deskripsi_foto }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Pilih Foto Baru</label>
                        <input class="form-control" type="file" id="foto" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection




{{-- <form action="{{ route('preview.storeKomentar', $data->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="isi_komentar" class="form-label">Tambahkan Komentar:</label>
        <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form> --}}
