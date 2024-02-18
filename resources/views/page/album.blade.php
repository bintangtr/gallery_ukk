@extends('layouts.app')
@section('title', 'Album')
@section('content')
    <div>

        <h1>'ALBUM'</h1>
    <div class="mt-5">
        <h5 class="fw-normal">ID : <p class="fw-medium">{{ Auth::user()->id }}</p></h5>
        <h5 class="fw-normal">Username : <p class="fw-medium">{{ Auth::user()->username }}</p></h5>
        <h5 class="fw-normal">Nama Lengkap : <p class="fw-medium">{{ Auth::user()->nama_lengkap }}</p></h5>
        <h5 class="fw-normal">Alamat : <p class="fw-medium">{{ Auth::user()->alamat }}</p></h5>
    </div>
    </div>
@endsection
