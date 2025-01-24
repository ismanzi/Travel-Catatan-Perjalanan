@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
<h1>Registrasi</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik') }}" required>
        @error('nik')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Daftar</button>
</form>

<p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
@endsection
