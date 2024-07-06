@extends('layout.main')

@section('container')
<div class="container">
    <div class="row" style="margin-top: 200px">
        <div class="col-md-6 offset-md-3">
            <div class="container">
                <h2 class="text-center">My Ticket</h2>

                @if(count($registrations) > 0)
                    <div class="ticket-wrapper">
                        @foreach($registrations as $registration)
                            <div class="ticket">
                                <div class="ticket-info">
                                    <h3>Pendakian Gunung Andong</h3>
                                    <h5 style="color:black"> {{ $registration->id }}</h5>
                                    <hr class="divider">
                                    <p>{{ $registration->pendaki->name }}</p>
                                    <p><strong>Tanggal Naik:</strong> {{ $registration->tanggal_naik }}</p>
                                    <p><strong>Tanggal Turun:</strong> {{ $registration->tanggal_turun }}</p>
                                    <p><strong>Via Jalur:</strong> {{ $registration->trail->name }}</p>
                                </div>
                                <div class="ticket-status">
                                    <p><strong>Status:</strong> {{ $registration->status }}</p>
                                    <div class="qr-code">
                                        {!! $registration->qr_code !!}
                                    </div>
                                    <p>Harga: Rp {{ $registration->trail->harga_tiket }}</p>
                                </div>
                            </div>

                            <div class="ticket-actions text-center d-flex justify-content-center">
                                <a href="{{ route('ticket.edit', encrypt($registration->id)) }}" class="btn btn-primary btn-sm ">Edit</a>
                                <form action="{{ route('ticket.destroy', encrypt($registration->id)) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                                </form>
                                
                            </div>

                            <hr class="divider">
                        @endforeach
                    </div>
                @else
                    <p class="text-center">Tidak ada tiket pendaftaran.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@livewireScripts
@endsection
