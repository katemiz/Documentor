<?php

namespace App\Http\Livewire;

use App\Models\Bina;
use Livewire\Component;

class BinaView extends Component
{
    public function render()
    {
        $bina = Bina::find(request()->id);

        return view('bina.bina-view', [
            'notification' => false,
            'bina' => $bina,
        ]);
    }
}
