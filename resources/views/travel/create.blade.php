@extends('layouts.app')

@section('title', 'Tambah Catatan Perjalanan')

@section('content')
<h1>Tambah Catatan Perjalanan</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form method="POST" action="{{ route('travel.store') }}">
    @csrf
    <div class="mb-3">
        <label for="travel_date" class="form-label">Tanggal</label>
        <input type="date" name="travel_date" id="travel_date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="travel_time" class="form-label">Waktu</label>
        <input type="time" name="travel_time" id="travel_time" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Lokasi</label>
        <input type="text" name="location" id="location" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="body_temperature" class="form-label">Suhu Tubuh</label>
        <input type="number" name="body_temperature" id="body_temperature" class="form-control" step="0.1" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
