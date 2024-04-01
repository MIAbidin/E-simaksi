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
                                    <h5 style="color:black"> {{ $registration->registration_id }}</h5>
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
                                </div>
                            </div>

                            <div class="ticket-actions">
                                <form action="{{ route('tiket.destroy', $registration->id) }}" method="post" class="d-inline float-right">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                                </form>
                            </div>
                            

                            <hr class="divider">
                        @endforeach
                    </div>
                @else
                    <p>Tidak ada tiket pendaftaran.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@livewireScripts

<style>
    .ticket-wrapper {
        margin-top: 20px;
    }

    .ticket {
        display: flex;
        justify-content: space-between;
        background-color: white;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 10px;
        box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.3);
    }

    .ticket-info {
        width: 70%;
        border-right: 3px dashed #080808;
        padding-right: 10px; /* Memberikan padding agar garis putus-putus tidak terlalu dekat dengan teks */
    }

    .ticket-status {
        width: 25%;
        padding: 10px; /* Memberikan padding agar garis putus-putus tidak terlalu dekat dengan teks */
    }

    .qr-code {
        margin-top: 10px;
        text-align: center;
    }

    .qr-code svg {
        max-width: 100%;
        height: auto;
    }

    .divider {
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .ticket-actions .btn {
    border-radius: 0; 
    width: 60px;
    }

    
</style>
@endsection
