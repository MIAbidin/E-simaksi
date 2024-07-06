<div>
    
    <form wire:submit.prevent="pendaftaran">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)
            
     
        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 1/4 - Personal Details</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jumlah Pendaki</label>
                                <input type="integer" class="form-control" placeholder="ex:2" wire:model="jumlah_pendaki">
                               <span class="text-danger">@error('jumlah_pendaki'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Naik</label>
                                <input type="date" class="form-control" wire:model="tanggal_naik">
                                <span class="text-danger">@error('tanggal_naik'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Turun</label>
                                <input type="date" class="form-control" placeholder="Enter your age" wire:model="tanggal_turun">
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
                <div class="card-header bg-secondary text-white">STEP 2/4 - Address & Contacts</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" wire:model="name_pendaki">
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
                               <span class="text-danger">@error('no_identitas'){{ $message }}@enderror</span>
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
                <div class="card-header bg-secondary text-white">STEP 3/4 - Frameworks experience</div>
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur explicabo, impedit maxime possimus excepturi veniam ut error sit, molestias aliquam repellat eos porro? Sit ex voluptates nemo veritatis delectus quia?
                    <div class="frameworks d-flex flex-column align-items-left mt-2">
                        <label for="laravel">
                            <input type="checkbox" id="laravel" value="laravel" wire:model="frameworks"> Laravel
                        </label>
                        <label for="codeigniter">
                           <input type="checkbox" id="codeigniter" value="codeigniter" wire:model="frameworks"> Codeigniter
                       </label>
                       <label for="vuejs">
                           <input type="checkbox" id="vuejs" value="vuejs" wire:model="frameworks"> Vue Js
                       </label>
                       <label for="cakePHP">
                           <input type="checkbox" id="cakePHP" value="cakePHP" wire:model="frameworks"> CakePHP
                       </label>
                    </div>
                    <span class="text-danger">@error('frameworks'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>
        @endif

        {{-- STEP 4 --}}
        @if ($currentStep == 4)
            
    
        <div class="step-four">
            <div class="card">
                <div class="card-header bg-secondary text-white">STEP 4/4 - Attachments</div>
                <div class="card-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque delectus officia inventore id facere at aspernatur ad corrupti asperiores placeat, fugiat tempora soluta optio recusandae eligendi impedit ipsam ullam amet!
                    <div class="form-group">
                        <label for="cv">CV</label>
                        <input type="file" class="form-control" wire:model="cv">
                        <span class="text-danger">@error('cv'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="terms" class="d-block">
                            <input type="checkbox"  id="terms" wire:model="terms"> You must agree with our <a href="#">Terms and Conditions</a>
                        </label>
                        <span class="text-danger">@error('terms'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
        </div>

        @endif

        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

           @if ($currentStep == 1)
               <div></div>
           @endif

           @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
           @endif
           
           @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
           @endif
           
           @if ($currentStep == 4)
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
           @endif
               
              
        </div>

    </form>


</div>