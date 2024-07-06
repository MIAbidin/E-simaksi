<!-- resources/views/ticket/edit.blade.php -->

@extends('layout.main')

@section('container')
    <div class="container" style="margin-top: 200px">
        <h1>Edit Tiket</h1>

        <form action="{{ route('ticket.update', encrypt($registration->id)) }}" method="post">
            @csrf
            @method('PUT')

            <!-- Bagian Pendakian -->
            <h2>Informasi Pendakian</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_naik">Tanggal Naik</label>
                        <input type="date" class="form-control" name="tanggal_naik" value="{{ $registration->tanggal_naik }}">
                        <span class="text-danger">@error('tanggal_naik'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal_turun">Tanggal Turun</label>
                        <input type="date" class="form-control" name="tanggal_turun" value="{{ $registration->tanggal_turun }}" >
                        <span class="text-danger">@error('tanggal_turun'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_trail">Nama Trail</label>
                        <select name="trail_id" class="form-control">
                            @foreach ($trails as $trail)
                                <option value="{{ $trail->id }}" {{ $registration->trail->id == $trail->id ? 'selected' : '' }}>
                                    {{ $trail->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('trail_id'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            

            <!-- Bagian Data Pendaki -->
            <h2>Data Pendaki</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pendaki">Nama Pendaki</label>
                        <input type="text" class="form-control" name="nama_pendaki" value="{{ $registration->pendaki->name }}">
                        <span class="text-danger">@error('nama_pendaki'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_identitas">Nomor Identitas</label>
                        <input type="text" class="form-control" name="no_identitas" value="{{ $registration->pendaki->no_identitas }}" >
                        <span class="text-danger">@error('no_identitas'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pendaki">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="{{ $registration->pendaki->tempat_lahir }}">
                        <span class="text-danger">@error('tempat_lahir'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_identitas">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggal_lahir" value="{{ $registration->pendaki->tanggal_lahir }}" >
                        <span class="text-danger">@error('tanggal_lahir'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="" selected>Jenis Kelamin</option>
                            <option value="Pria" {{ $registration->pendaki->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                            <option value="Perempuan" {{ $registration->pendaki->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>                        
                        <span class="text-danger">@error('jenis_kelamin'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_identitas">Nomor Hp</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ $registration->pendaki->no_hp }}" >
                        <span class="text-danger">@error('no_hp'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $registration->pendaki->alamat }}">
                        <span class="text-danger">@error('alamat'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>


            <!-- Bagian Kontak Darurat -->
            <h2>Kontak Darurat</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama_kontak_darurat" value="{{ $registration->name }}">
                        <span class="text-danger">@error('nama_kontak_darurat'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                       <label for="">Nomor Hp</label>
                       <input type="text" class="form-control" name="no_hp_kontak_darurat" value="{{ $registration->no_hp }}">
                       <span class="text-danger">@error('no_hp_kontak_darurat'){{ $message }}@enderror</span>
                   </div>
               </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat_kontak_darurat" value="{{ $registration->alamat }}">
                        <span class="text-danger">@error('alamat_kontak_darurat'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                       <label for="">Hubungan</label>
                        <select class="form-control" name="hubungan_kontak_darurat" value="{{ $registration->hubungan }}>
                            <option value="" selected>Hubungan</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Orang Tua">Orang Tua</option>
                            <option value="Saudara">Saudara</option>
                        </select>
                       <span class="text-danger">@error('hubungan_kontak_darurat'){{ $message }}@enderror</span>
                   </div>
               </div>
            </div>

            <div>
                <div class="d-flex justify-content-between">
                    <a href="/ticket">
                      <button type="button" class="btn btn-md btn-secondary mt-5 mb-5">Back</button>
                    </a>
                    
                    <button type="submit" class="btn btn-md btn-primary mt-5 mb-5">Simpan</button>
                  </div>
                  
            </div>
            
        </form>
    </div>
@endsection
