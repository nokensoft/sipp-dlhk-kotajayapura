<?php

namespace App\Livewire\Bidang;

use App\Models\Bidang; // Added this line

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;

class Form extends Component
{

    public $bidang = [];

    #[Url(history: true)]
    public string $id = '';

    protected $rules = [
        'bidang.bidang' => 'required',
        'bidang.keterangan' => 'nullable',
    ];

    protected $messages = [
        'bidang.bidang.required' => 'Nama bidang tidak boleh kosong',
    ];

    public function mount(): void 
    {
        if ($this->id != ''){
            $this->bidang = Bidang::query()->find($this->id)?->toArray();
        }        
    }
    
    public function save(): void 
    {
        // $this->fileChecking();
        $this->validate();

        try {
            DB::beginTransaction();
            
            Bidang::updateOrCreate(
                [
                    'id' => $this->bidang['id'] ?? null
                ],
                $this->bidang
            );

            DB::commit();

        }catch (Exception $e){
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }
        $message = 'tambahkan data baru!';
        if (isset($this->pegawai['id'])){
            $message = 'ubah data!';
        }
        session()->flash('success', $message);
        $this->redirectRoute( 'bidang');
    }
    
    public function render(): View
    {
        return view('livewire.bidang.form');
    }
}
