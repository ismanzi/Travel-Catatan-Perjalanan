<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Catatan Perjalanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .btn-group .btn {
            padding: 6px 10px;
            font-size: 14px;
        }

        .table th {
            background-color: #f4f6f9;
            text-transform: uppercase;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
 
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">📋 Daftar Catatan Perjalanan</h1>
            <div>
                <a href="{{ route('home') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
                <a href="{{ route('travel.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Catatan
                </a>
            </div>
        </div>
        

        <!-- Form Pencarian -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <form action="{{ route('travel.index') }}" method="GET" class="row g-2">
                    <div class="col-md-4">
                        <input type="date" name="travel_date" class="form-control" placeholder="Cari berdasarkan tanggal" value="{{ request('travel_date') }}">
                    </div>
                    <div class="col-md-4">
                        <input type="time" name="travel_time" class="form-control" placeholder="Cari berdasarkan waktu" value="{{ request('travel_time') }}">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="location" class="form-control" placeholder="Cari berdasarkan lokasi" value="{{ request('location') }}">
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar Catatan Perjalanan -->
        <div class="card shadow-sm border-0">
            <div class="card-header">
                <h5 class="mb-0">Catatan Perjalanan</h5>
            </div>
            <div class="card-body">
                @if($travelLogs->isEmpty())
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle-fill"></i> <strong>Belum ada catatan perjalanan.</strong> <a href="{{ route('travel.create') }}" class="alert-link">Klik di sini</a> untuk mulai mencatat perjalanan Anda.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>
                                        Tanggal
                                        <div class="btn-group ms-2">
                                            <a href="{{ route('travel.index', array_merge(request()->query(), ['sort_by' => 'travel_date', 'sort_order' => 'asc'])) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-arrow-up"></i>
                                            </a>
                                            <a href="{{ route('travel.index', array_merge(request()->query(), ['sort_by' => 'travel_date', 'sort_order' => 'desc'])) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-arrow-down"></i>
                                            </a>
                                        </div>
                                    </th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                    <th>
                                        Suhu Tubuh
                                        <div class="btn-group ms-2">
                                            <a href="{{ route('travel.index', array_merge(request()->query(), ['sort_by' => 'body_temperature', 'sort_order' => 'asc'])) }}" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-arrow-up"></i>
                                            </a>
                                            <a href="{{ route('travel.index', array_merge(request()->query(), ['sort_by' => 'body_temperature', 'sort_order' => 'desc'])) }}" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-arrow-down"></i>
                                            </a>
                                        </div>
                                    </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($travelLogs as $index => $log)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($log->travel_date)->format('d M Y') }}</td>
                                    <td>{{ $log->travel_time }}</td>
                                    <td>{{ $log->location }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $log->body_temperature }} °C</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('travel.edit', $log->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('travel.destroy', $log->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            @if(!$travelLogs->isEmpty())
            <div class="card-footer text-end">
                <a href="{{ route('travel.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Catatan Baru
                </a>
            </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
