<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Projects extends Component
{

    public $action;

    public $projectId;
    public $projectCode;
    public $projectTitle;
    public $projectScope;




    public function render()
    {




        switch ($this->action) {

            case 'addproject':
            default:

                $this->action = 'addproject';
                $this->projectId = false;
                $this->projectTitle = false;
                $this->projectCode = false;
                $this->projectScope = false;

                break;

            case 'viewdoc':
                $doc = Doc::find($this->docId);
                $this->setParams($doc,false);
                break;
        }







        return view('livewire.projects');
    }
}
