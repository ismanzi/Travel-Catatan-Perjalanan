@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg border-0" style="width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="fw-bold mb-0">Login</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="nik" class="form-label fw-bold">NIK</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                        <input type="text" name="nik" id="nik" class="form-control" required placeholder="Masukkan NIK">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nama</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="nama" id="nama" class="form-control" required placeholder="Masukkan Nama">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right"></i> Login
                </button>
            </form>

            <div class="text-center mt-3">
                <p class="mb-0">Belum punya akun?</p>
                <a href="{{ route('register') }}" class="btn btn-outline-primary w-100">
                    <i class="bi bi-person-plus"></i> Registrasi di sini
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
