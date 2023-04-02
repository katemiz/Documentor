<?php

namespace App\Http\Livewire;

use App\Models\Bedel;
use App\Models\Bina;
use App\Models\Kalem;
use App\Models\Sakin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use Livewire\WithPagination;

class BedelList extends Component
{
    use WithPagination;

    public $search = '';
    public $type = false;

    public $sortField = 'title';
    public $sortDirection = 'asc';

    public $sortTimeField = 'created_at';
    public $sortTimeDirection = 'desc';

    public $notification = false;

    protected $listeners = ['delete' => 'delete'];

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

    public function render(Request $req)
    {
        $bina = Bina::find($req->id);

        $q = Bedel::query(['bina_id' => $req->id]);

        if ($bina->user_id !== Auth::id()) {
            dd('olmadi');
            abort('404');
        }

        return view('bina.bedel-list', [
            'bina' => $bina,
            'notification' => $this->notification,
            'bedeller' => $q->paginate(
                Config::get('constants.table.no_of_results')
            ),
        ]);
    }

    // public function ara($query)
    // {
    //     $this->search = $query;
    // }

    // public function resetFilter()
    // {
    //     $this->search = '';
    //     $this->resetPage();
    // }

    // public function getSakinler($req)
    // {
    //     $q = Sakin::query()->orderBy(
    //         $this->sortTimeField,
    //         $this->sortTimeDirection
    //     );

    //     $q->where('bina_id', '=', $req->id);

    //     if (strlen($this->search) > 0) {
    //         $q->where('name', 'like', '%' . $this->search . '%');
    //         $q->orWhere('lastname', 'like', '%' . $this->search . '%');
    //     }

    //     return $q;
    // }

    // public function checkUser($binaid)
    // {
    //     $bina = Bina::find($binaid);

    //     if ($bina->user_id === Auth::id()) {
    //         return true;
    //     }

    //     return $bina;
    // }

    public function delete(Request $request, $type, $binaid, $id)
    {
        Kalem::find($id)->delete();

        $request->id = $binaid; // needed for render()

        $this->notification = [
            'type' => 'is-success',
            'message' => 'Harcama kalem tanımı silinmiştir.',
        ];
    }
}
