@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">📋 Dashboard</h1>
        <span class="badge bg-primary fs-5 py-2 px-3 shadow-sm">
            Selamat datang, <strong>{{ auth()->user()->name }}</strong>!
        </span>
    </div>

    <!-- Statistik Ringkasan -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-list-check display-3 text-primary"></i>
                    <h5 class="card-title mt-3">Total Catatan</h5>
                    <p class="display-5 fw-bold text-primary">{{ $totalLogs }}</p>
                    <p class="text-muted mb-0">Catatan perjalanan Anda</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-thermometer-half display-3 text-danger"></i>
                    <h5 class="card-title mt-3">Rata-rata Suhu Tubuh</h5>
                    <p class="display-5 fw-bold text-danger">
                        {{ $travelLogs->avg('body_temperature') ? number_format($travelLogs->avg('body_temperature'), 1) : 'N/A' }} °C
                    </p>
                    <p class="text-muted mb-0">Dari catatan terbaru</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow h-100">
                <div class="card-body text-center">
                    <i class="bi bi-calendar-event display-3 text-success"></i>
                    <h5 class="card-title mt-3">Catatan Terbaru</h5>
                    <p class="fw-bold text-success">
                        {{ $travelLogs->first() ? \Carbon\Carbon::parse($travelLogs->first()->travel_date)->format('d M Y') : 'N/A' }}
                    </p>
                    <p class="text-muted mb-0">Tanggal catatan terakhir Anda</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Catatan Perjalanan Terbaru -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Catatan Perjalanan Terbaru</h5>
        </div>
        <div class="card-body">
            @if($travelLogs->isEmpty())
                <div class="alert alert-info text-center">
                    <strong>Belum ada catatan perjalanan.</strong> <a href="{{ route('travel.create') }}" class="alert-link">Klik di sini</a> untuk mulai mencatat perjalanan Anda.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th>Suhu Tubuh</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($travelLogs as $index => $log)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($log->travel_date)->format('d M Y') }}</td>
                                <td>{{ $log->travel_time }}</td>
                                <td>{{ $log->location }}</td>
                                <td>{{ $log->body_temperature }} °C</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('travel.index') }}" class="btn btn-primary">
                <i class="bi bi-eye"></i> Lihat Semua Catatan
            </a>
            <a href="{{ route('travel.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Catatan Baru
            </a>
        </div>
    </div>
</div>
@endsection
