<?php

namespace App\Livewire\Bidang;

use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;

class Form extends Component
{

    #[Url(history: true)]
    public string $id = '';

    
    public function render(): View
    {
        return view('livewire.bidang.form');
    }
}
