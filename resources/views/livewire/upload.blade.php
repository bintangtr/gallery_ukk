<link href="{{ asset('assets/bootstrap/upload.css') }}" rel="stylesheet">
<div>
    <h1>UPLOAD</h1>
    <div class="container mt-6">
        <div class="card-body">
            <form action="{{ url('/u_upload') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="lokasi_file" class="drop-container" id="dropcontainer">
                            <span class="drop-title">Drop files here</span>
                            or
                            <input type="file" name="lokasi_file" id="lokasi_file" accept="image/*" required>
                        </label>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="judul_foto">Judul Foto</label>
                            <input type="text" name="judul_foto" id="judul_foto" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label for="deskripsi_foto" class="form-label">Deskripsi Foto</label>
                            <textarea name="deskripsi_foto" id="deskripsi_foto" class="form-control" placeholder="Tambahkan deskripsi.." style="height: 100px;"></textarea>
                        </div>
                        <div class="mb-2 mt-3">
                            <button type="submit" class="btn btn-outline-dark">Upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
