@extends('layouts.app')

@section('title', 'Edit Catatan Perjalanan')

@section('content')
<h1>Edit Catatan Perjalanan</h1>
<form method="POST" action="{{ route('travel.update', $travelLog->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="travel_date" class="form-label">Tanggal</label>
        <input type="date" name="travel_date" id="travel_date" class="form-control" value="{{ $travelLog->travel_date }}" required>
    </div>
    <div class="mb-3">
        <label for="travel_time" class="form-label">Waktu</label>
        <input type="time" name="travel_time" id="travel_time" class="form-control" value="{{ $travelLog->travel_time }}" required>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label">Lokasi</label>
        <input type="text" name="location" id="location" class="form-control" value="{{ $travelLog->location }}" required>
    </div>
    <div class="mb-3">
        <label for="body_temperature" class="form-label">Suhu Tubuh</label>
        <input type="number" name="body_temperature" id="body_temperature" class="form-control" step="0.1" value="{{ $travelLog->body_temperature }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
