<!-- resources/views/admin/registration_detail.blade.php -->
@extends('layout.admin')

@section('container')
<div class="container mt-5">
    <h1 class="mb-4">Detail Pendaftaran</h1>

    <div class="card">
        <div class="card-header">
            Detail Pendaftaran ID: {{ $registration->registration_id}}
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $registration->user->name }}</p>
            <p><strong>Trail:</strong> {{ $registration->trail->name }}</p>
            <p><strong>Tanggal Naik:</strong> {{ $registration->tanggal_naik }}</p>
            <p><strong>Tanggal Turun:</strong> {{ $registration->tanggal_turun }}</p>
            <p><strong>Status:</strong> {{ $registration->status }}</p>
            <h2>Data Pendaki</h2>
            <p><strong>Nama:</strong> {{ $registration->pendaki->name }}</p>
            <p><strong>No Identitas:</strong> {{ $registration->pendaki->no_identitas }}</p>
            <p><strong>Tempat Lahir:</strong> {{ $registration->pendaki->tempat_lahir }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $registration->pendaki->tanggal_lahir }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $registration->pendaki->jenis_kelamin }}</p>
            <p><strong>No Hp:</strong> {{ $registration->pendaki->no_hp }}</p>
            <H2>Data Kontak Darurat</H2>
            <p><strong>Nama:</strong> {{ $registration->name }}</p>
            <p><strong>No HP:</strong> {{ $registration->no_hp }}</p>
            <p><strong>Alamat:</strong> {{ $registration->alamat }}</p>
            <p><strong>Hubungan:</strong> {{ $registration->hubungan }}</p>
        </div>
    </div>
</div>
@endsection
