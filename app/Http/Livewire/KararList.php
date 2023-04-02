<?php

namespace App\Http\Livewire;

use App\Models\Dosya;
use App\Models\Karar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class KararList extends Component
{
    use WithPagination;

    protected $listeners = ['addKarar'];

    public $sortTimeField = 'created_at';
    public $sortTimeDirection = 'desc';

    public $karar;

    public function paginationView()
    {
        return 'livewire::my-pagination';
    }

    public function mount()
    {
        if (!session('bina_id')) {
            return redirect()->route('binalar');
        }
    }

    public function render()
    {
        $q = Karar::query()->orderBy(
            $this->sortTimeField,
            $this->sortTimeDirection
        );

        $q->where('bina_id', '=', session('bina_id'));

        $kararlar = $q->paginate(Config::get('constants.table.no_of_results'));

        return view('livewire.karar-list', [
            'kararlar' => $kararlar,
        ]);
    }

    public function addKarar(Request $request, $karar)
    {
        $props['user_id'] = Auth::id();
        $props['bina_id'] = session('bina_id');
        $props['title'] = $karar['title'];
        $props['karar'] = $karar['karar'];

        $karar = Karar::create($props);

        $this->addFiles($request, $karar->id);
    }

    public function addFiles($req, $id)
    {
        if ($req->has('dosyalar')) {
            dd($req->has('dosyalar'));

            foreach ($req->file('dosyalar') as $dosya) {
                if (strlen($dosya->getMimeType()) > 32) {
                    $filename = '/usr' . Auth::id() . '/file/other';
                } else {
                    $filename =
                        '/usr' . Auth::id() . '/' . $dosya->getMimeType();
                }

                $saved_dir = Storage::disk('local')->put($filename, $dosya);

                $this->saveRecord($dosya, $id, $saved_dir);
            }
        }
    }

    public function saveRecord($dosya, $karar_id, $saved_dir)
    {
        $dosya_data = [
            'karar_id' => $karar_id,
            'filename' => $dosya->getClientOriginalName(),
            'stored_as' => $saved_dir,
        ];

        Dosya::create($dosya_data);
    }
}
