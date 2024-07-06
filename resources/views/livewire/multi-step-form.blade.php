<div>
    
    <form wire:submit.prevent="pendaftaran">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)
            
     
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/4 - Pendakian</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Naik</label>
                                <input type="date" class="form-control"wire:model="tanggal_naik" min="{{ date('Y-m-d') }}">
                                <span class="text-danger">@error('tanggal_naik'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Turun</label>
                                <input type="date" class="form-control" wire:model="tanggal_turun" min="{{ date('Y-m-d') }}">
                                <span class="text-danger">@error('tanggal_turun'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Via Jalur</label>
                                <select class="form-control" wire:model="trail">
                                    <option value="" selected>Via jalur</option>
                                    @foreach($trails as $trailOption)
                                        <option value="{{ $trailOption }}">{{ $trailOption }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('trail'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)
            
       
        <div class="step-two">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 2/4 - Data Pendaki</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" wire:model="nama_pendaki">
                                <span class="text-danger">@error('name_pendaki'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Nomor Identitas</label>
                               <input type="text" class="form-control"wire:model="no_identitas">
                               <span class="text-danger">@error('no_identitas'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" wire:model="tempat_lahir">
                                <span class="text-danger">@error('tempat_lahir'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Tanggal Lahir</label>
                               <input type="date" class="form-control"wire:model="tanggal_lahir">
                               <span class="text-danger">@error('tanggal_lahir'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" wire:model="jenis_kelamin">
                                    <option value="" selected>Jenis Kelamin</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <span class="text-danger">@error('jenis_kelamin'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Hp</label>
                                <input type="text" class="form-control" wire:model="no_hp">
                                <span class="text-danger">@error('no_hp'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" class="form-control" wire:model="alamat">
                                <span class="text-danger">@error('alamat'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif
        {{-- STEP 3 --}}

        @if ($currentStep == 3)
            
    
        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 3/4 - Kontak Darurat</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" wire:model="nama_kontak_darurat">
                                <span class="text-danger">@error('nama_kontak_darurat'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Nomor Hp</label>
                               <input type="text" class="form-control"wire:model="noHP_kontak_darurat">
                               <span class="text-danger">@error('noHP_kontak_darurat'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" wire:model="alamat_kontak_darurat">
                                <span class="text-danger">@error('alamat_kontak_darurat'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                               <label for="">Hubungan</label>
                                <select class="form-control" wire:model="hubungan">
                                    <option value="" selected>Hubungan</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Istri">Istri</option>
                                    <option value="Anak">Anak</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Saudara">Saudara</option>
                                </select>
                               <span class="text-danger">@error('hubungan'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>

                </div>
            </div>
        </div>
        @endif

        {{-- STEP 4 --}}
        @if ($currentStep == 4)
            
    
        <div class="step-four">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 4/4 - Pembayaran</div>
                <div class="card-body">
                    <p>Informasi Pembayaran:</p>
                    <ul>
                        <li>Harga Tiket: Rp 20.000</li>
                    </ul>
                    
                    <p>No Rekening:</p>
                    <ul>
                        <li>BCA - 6860148155 (Budi Sudarsono)</li>
                        <li>Mandiri - 0700001855523 (Andi ALam)</li>
                    </ul>
                    
                    <p>Kirim Bukti Pembayaran ke Nomor WhatsApp ini <span style="color: blue"> 0821 5553 2475</span></p>
        
                </div>
            </div>
        </div>
        

        @endif

        <div class="text-right mt-4">
            @if ($currentStep > 1)
                <button wire:click="previousStep" class="btn btn-primary">Back</button>
            @endif
    
            @if ($currentStep < $totalSteps)
                <button wire:click="nextStep" class="btn btn-primary ml-2">Next</button>
            @elseif ($currentStep == $totalSteps)
                <button wire:click="pendaftaran" class="btn btn-success ml-2">Submit</button>
            @endif
        </div>

        

    </form>


</div>