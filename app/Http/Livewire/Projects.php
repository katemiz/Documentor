<?php

namespace App\Http\Livewire;

use App\Models\Project;


use Livewire\Component;

class Projects extends Component
{
    public function render()
    {




        switch ($this->action) {
            case 'addproject':
                $this->projectId = false;
                break;

            case 'viewdoc':
            //default:
                $doc = Doc::find($this->docId);
                $this->setParams($doc,false);
                break;
        }

        return view('docs.docall');






        return view('livewire.projects');
    }
}
