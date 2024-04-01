<?php

namespace App\Livewire;
use App\Models\Kuota;
use App\Models\Trail;
use App\Models\Pendaki;

use Livewire\Component;
use App\Models\pendaftaran;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MultiStepForm extends Component
{
    public $totalSteps = 4;
    public $currentStep = 1;
    public $trails;
    public $jumlah_pendaki;
    public $tanggal_naik;
    public $tanggal_turun;
    public $trail;
    public $nama_pendaki;
    public $no_identitas;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $no_hp;
    public $alamat;
    public $nama_kontak_darurat;
    public $noHP_kontak_darurat;
    public $alamat_kontak_darurat;
    public $hubungan;

    public function mount(){
        $this->currentStep = 1;
        $this->trails = Trail::pluck('name');
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }
    

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
         $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'tanggal_naik'=>'required',
                'tanggal_turun'=>'required',
                'trail'=>'required'
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                 'nama_pendaki'=>'required',
                 'no_identitas'=>'required|integer',
                 'tempat_lahir'=>'required',
                 'tanggal_lahir'=>'required',
                 'jenis_kelamin'=>'required',
                 'no_hp'=>'required|integer',
                 'alamat'=>'required'

              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                  'nama_kontak_darurat'=>'required',
                  'noHP_kontak_darurat'=>'required',
                  'alamat_kontak_darurat'=>'required',
                  'hubungan'=>'required'
              ]);
        }
    }

    public function pendaftaran()
    {
        $this->validateData();

        
        $pendaftaran = Pendaftaran::create([
            'user_id' => auth()->user()->id,
            'pendaki_id' => $this->getPendakiId(),
            'trail_id' => $this->getTrailId(),
            'tanggal_naik' => $this->tanggal_naik,
            'tanggal_turun' => $this->tanggal_turun,
            'status' => 'Unpaid',
            'name' => $this->nama_kontak_darurat,
            'no_hp' => $this->noHP_kontak_darurat,
            'hubungan' => $this->hubungan,
            'alamat' => $this->alamat_kontak_darurat,
            'registration_id' => $this->generateRegistrationId(),
        ]);

        $qrCode = QrCode::size(200)->generate($pendaftaran->registration_id);

        $pendaftaran->update(['qr_code' => $qrCode]);

        $this->currentStep = 4;

        session()->flash('message', 'Pendaftaran berhasil!');

    }

    private function getPendakiId()
    {
        $pendaki = Pendaki::create([
            'name' => $this->nama_pendaki,
            'no_identitas' => $this->no_identitas,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
        ]);

        return $pendaki->id;
    }

    private function getTrailId()
    {
        $trail = Trail::where('name', $this->trail)->first();
        return $trail->id;
    }

    private function generateRegistrationId()
    {
        
        $tanggalNaik = date('Ymd', strtotime($this->tanggal_naik));
        $randomString = $this->generateRandomString(4);
        return $tanggalNaik . '-' . $randomString;
    }

    private function generateRandomString($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}
