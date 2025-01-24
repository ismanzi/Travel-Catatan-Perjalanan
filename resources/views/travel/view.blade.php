@extends('layouts.app')

@section('title', 'Detail Catatan Perjalanan')

@section('content')
<h1>Detail Catatan Perjalanan</h1>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tanggal: {{ $travelLog->travel_date }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Waktu: {{ $travelLog->travel_time }}</h6>
        <p class="card-text">
            <strong>Lokasi:</strong> {{ $travelLog->location }}<br>
            <strong>Suhu Tubuh:</strong> {{ $travelLog->body_temperature }} °C
        </p>
        <a href="{{ route('travel.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
