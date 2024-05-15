<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Exception;

class Form extends Component
{
    public $lokasi = [];

    #[Url(history: true)]
    public string $id = '';

    protected $rules = [
        'lokasi.lokasi' => 'required',
        'lokasi.keterangan' => 'nullable',
        'lokasi.latitude' => 'nullable',
        'lokasi.longitude' => 'nullable',
    ];

    protected $messages = [
        'lokasi.lokasi.required' => 'Nama lokasi tidak boleh kosong',
    ];

    public function mount(): void
    {
        if ($this->id != ''){
            $this->lokasi = Lokasi::query()->find($this->id)?->toArray();
        }
    }

    public function save(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            Lokasi::updateOrCreate(
                [
                    'id' => $this->lokasi['id'] ?? null
                ],
                $this->lokasi
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->lokasi['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('lokasi');
    }

    public function render(): View
    {
        return view('livewire.lokasi.form');
    }
}
