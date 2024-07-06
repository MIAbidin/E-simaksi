<?php

namespace App\Livewire;

use App\Models\Trail;
use Livewire\Component;

class Contents extends Component
{
    public $count = 6;

    public function render()
    {
        $trails = Trail::take($this->count)->get();
        $totalTrails = Trail::count();
        return view('livewire.contents', [
            'trails' => $trails,
            'totalTrails' => $totalTrails
        ]);
    }

    public function loadmore()
    {
        $this->count += 6;
        sleep(2);
    }
}
