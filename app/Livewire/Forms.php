<?php

namespace App\Livewire;
use App\Models\Kuota;
use App\Models\Trail;
use App\Models\Pendaki;

use Livewire\Component;
use App\Models\pendaftaran;

class Forms extends Component
{
    public $totalSteps = 4;
    public $currentStep = 1;
    public $trails;
    public $jumlah_pendaki;
    public $tanggal_naik;
    public $tanggal_turun; // Corrected property name
    public $trail;

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
                'jumlah_pendaki'=>'required|integer',
                'tanggal_naik'=>'required',
                'tanggal_turun'=>'required',
                'trail'=>'required'
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                 'email'=>'required|email|unique:students',
                 'phone'=>'required',
                 'country'=>'required',
                 'city'=>'required'
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                  'frameworks'=>'required|array|min:2|max:3'
              ]);
        }
    }
}
