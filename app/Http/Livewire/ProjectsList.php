<?php

namespace App\Http\Livewire;


use App\Models\Project;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;


use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsList extends Component
{

    use WithPagination;

    public $search = '';


    public $sortField = 'title';
    public $sortDirection = 'asc';

    public $sortTimeField = 'created_at';
    public $sortTimeDirection = 'desc';

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
        $q = $this->getProjects();

        return view('livewire.projects-list', [
            'notification' => false,
            'projects' => $q->paginate(
                Config::get('constants.table.no_of_results')
            ),
        ]);
    }



    public function getProjects()
    {
        $q = Project::query()->orderBy(
            $this->sortTimeField,
            $this->sortTimeDirection
        );

        $q->where('user_id', '=', Auth::id());

        if (strlen($this->search) > 0) {
            $q->where('title', 'like', '%' . $this->search . '%');
        }

        return $q;
    }



}
