@extends('layout.admin')

@section('container')
<div class="container mt-5">
    <h1 class="mb-4">Admin Dashboard</h1>

    <!-- Informasi Pendapatan -->
    <div class="card mb-4">
        <div class="card-header">
            Total Income
        </div>
        <div class="card-body">
            <h5 class="card-title">Total Pendapatan: {{ number_format($totalIncome, 2) }}</h5>
        </div>
    </div>

    <!-- Form untuk mengatur harga tiket -->
    <div class="card">
        <div class="card-header">
            Set Harga Tiket
        </div>
        <div class="card-body">
            <form action="{{ route('admin.set_price') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="trail_id" class="form-label">Jalur Pendakian</label>
                    <select class="form-select" id="trail_id" name="trail_id" required>
                        @foreach($trails as $trail)
                            <option value="{{ $trail->id }}">{{ $trail->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga_tiket" class="form-label">Harga Tiket</label>
                    <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" min="0" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Filter Form -->
    <form action="{{ route('admin.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <label for="trail_id" class="form-label">Filter by Trail</label>
                <select class="form-select" id="trail_id" name="trail_id">
                    <option value="">-- All Trails --</option>
                    @foreach($trails as $trail)
                        <option value="{{ $trail->id }}" {{ request('trail_id') == $trail->id ? 'selected' : '' }}>{{ $trail->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="tanggal_naik" class="form-label">Filter by Date</label>
                <input type="date" class="form-control" id="tanggal_naik" name="tanggal_naik" value="{{ request('tanggal_naik') }}">
            </div>
            <div class="col-md-3">
                <label for="status" class="form-label">Filter by Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="">-- All Status --</option>
                    <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                    <option value="Unpaid" {{ request('status') == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                    <option value="Expired" {{ request('status') == 'Expired' ? 'selected' : '' }}>Expired</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label><br>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Clear</a>
            </div>
        </div>
    </form>

    <!-- Tabel untuk menampilkan data -->
    <div class="mt-5">
        <h3>Latest Registrations</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Registration ID</th>
                    <th>Pendaki</th>
                    <th>Trail</th>
                    <th>Tanggal Naik</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestRegistrations as $registration)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $registration->registration_id }}</td>
                    <td>{{ $registration->pendaki->name }}</td>
                    <td>{{ $registration->trail->name }}</td>
                    <td>{{ $registration->tanggal_naik }}</td>
                    <td>{{ $registration->status }}</td>
                    <td>
                        <!-- Form untuk mengubah status -->
                        <form action="{{ route('admin.update_status', ['id' => $registration->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="Paid" {{ $registration->status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="Unpaid" {{ $registration->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                    <option value="Expired" {{ $registration->status == 'Expired' ? 'selected' : '' }}>Expired</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.registrations.show', ['id' => $registration->id]) }}" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
