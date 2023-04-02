<?php

namespace App\Http\Livewire;

use App\Models\Doc;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class DocsList extends Component
{
    use WithPagination;

    //public $selectedbina = false;

    public $search = '';
    public $type = false;

    public $sortField = 'title';
    public $sortDirection = 'asc';

    public $sortTimeField = 'created_at';
    public $sortTimeDirection = 'desc';

    protected $listeners = ['delete' => 'deleteAttach'];

    public function paginationView()
    {
        return 'livewire::my-pagination';
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection =
                $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }

        if ($this->sortTimeField === $field) {
            $this->sortTimeDirection =
                $this->sortTimeDirection === 'asc' ? 'desc' : 'asc';
        }
    }

    public function render()
    {
        $q = $this->getDocs();

        return view('docs.docs-list', [
            'notification' => false,
            'docs' => $q->paginate(
                Config::get('constants.table.no_of_results')
            ),
        ]);
    }

    public function ara($query)
    {
        $this->search = $query;
    }

    public function resetFilter()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function getDocs()
    {
        $q = Doc::query()->orderBy(
            $this->sortTimeField,
            $this->sortTimeDirection
        );

        $q->where('user_id', '=', Auth::id());

        if (strlen($this->search) > 0) {
            $q->where('name', 'like', '%' . $this->search . '%');
        }

        return $q;
    }

    public function selectActive($id)
    {
        $bina = Bina::find($id);

        session(['selected_bina' => $bina->name, 'bina_id' => $id]);

        $this->selectedbina = $id;

        // dd('selected');

        // return redirect()->route('dashboard');
    }
}
