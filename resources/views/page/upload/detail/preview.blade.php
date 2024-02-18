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
                        <div class="d-flex align-items-center mb-3">
                            <p class="fw-semibold">{{ $userId }}</p>
                            <span class="mx-1"> </span>
                            <p class="fw-normal">{{ $data->tanggal_unggah }}</p>
                            <span class="mx-5 ps-5"> </span>
                            <a href="/" class="nav-link"><i class="fa-solid fa-circle-arrow-left fa-2xl"></i></a>
                            @if (auth()->check() && $data->user_id == auth()->user()->id)
                                <!-- Tampilkan tombol hapus hanya jika pengguna saat ini adalah pemilik foto -->
                                <form action="{{ route('preview.delete', $data) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                        <hr>
                        <div class="d-flex justify-content-start">
                            <h5>{{ $data->judul_foto }}</h5>
                        </div>
                        <div class="d-flex justify-content-start ">
                            <h6>{{ $data->deskripsi_foto }}</h6>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <b class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></b>
                            </button>
                            <a href="#" class="btn btn-sm" onclick="">
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </div>

                        <hr>
                        <p class="fw-medium">Komentar</p>
                        <div class="container text-start">
                            <div class="d-flex justify-content-start">
                                <div class="comments mt-3 mb-4">
                                    {{-- @foreach ($data->comments as $comment)
                                        <div class="mb-2">
                                            <img src="{{ $comment->user->profile_picture_url }}" alt="Avatar"
                                                class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                            <span class="fw-bold">{{ $comment->user->username }}</span>
                                            {{ $comment->isi_komentar }}
                                        </div>
                                    @endforeach --}}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-start">
                            {{-- <form action="{{ route('like.toggle', ['foto_id' => $data->foto_id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">
                                    @if ($isLiked)
                                        Unlike
                                    @else
                                        Like
                                    @endif
                                </button>
                            </form> --}}
                        </div>

                        <!-- Form untuk menambahkan komentar baru -->
                        <form action="{{ route('comment.add', $data->id) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="isi_komentar" class="form-control" placeholder="Tambahkan komentar">
                                <button type="submit" class="btn btn-dark" id="button-addon2">Kirim</button>
                            </div>
                        </form>

                    </div>
                </div>
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
