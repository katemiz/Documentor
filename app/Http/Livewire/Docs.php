<?php

namespace App\Http\Livewire;

use App\Models\Doc;
use App\Models\Doctree;
use App\Models\DocContent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Livewire\Component;

class Docs extends Component
{
    public $tree;

    public $docId;
    public $docNo;
    public $docRevision;
    public $docRevisionStatus;
    public $docTitle;
    public $docPurpose;
    public $docScope;

    public $contentId;
    public $contentTitle;
    public $contentEditorData;
    public $contentParentId;

    public $action;






    public function mount()
    {
        // adddoc - form
        // editdoc - form
        // viewdoc - HTML
        // insertdoc - db action
        // updatedoc - db action

        // addcontent - form
        // viewcontent - HTML
        // insertcontent - db action 
        // updatecontent - db action

        if (request('idDoc')) {
            $this->docId = request('idDoc');
            $this->action = 'viewdoc';
        } else {
            $this->docId = false;
            $this->action = 'adddoc';
        }

        if (request('idContent')) {
            $this->contentId = request('idContent');
        } else {
            $this->contentId = false;
        }
    }


    public function render(Request $request)
    {
        switch ($this->action) {
            case 'adddoc':
                $this->docId = false;
                break;

            case 'viewdoc':
            //default:
                $doc = Doc::find($this->docId);
                $this->setParams($doc,false);
                break;
        }

        return view('docs.docall');
    }

    public function updateTreeTitle()
    {
        $this->dispatchBrowserEvent('newContentTitle',['contentTitle' => $this->contentTitle]);        

    }


    public function setParams($doc,$content) {

        if ($doc) {

            $doctree = Doctree::where("doc_id",$this->docId)->get()["0"];

            $this->docNo = $doc->DocNo;
            $this->docRevision = $doc->Revision;
            $this->docStatus = $doc->RevisionStatus;
            $this->docNo = $doc->DocNo;

            $this->docTitle = $doc->Title;
            $this->docPurpose = $doc->Purpose;
            $this->docScope = $doc->Scope;

            $this->tree = json_decode($doctree->tree);
        }

    }












    public function changeAction($action) {
        $this->action = $action;
        //dd($data);
        //dd($this->action);

        
    }



    public function addContent($parentContentId) {

        $this->action = 'addcontent';
        $this->contentId = false;
        $this->contentParentId = $parentContentId;
        $this->contentTitle = '';
        $this->contentEditorData = '';

        $this->dispatchBrowserEvent('updateForContentAdd', ['tree' => $this->tree,'parentContentId' => $parentContentId]);
        $this->dispatchBrowserEvent('initializeCKEditors',['editorIds' => ['contentEditorData']]);        
    }

    public function editContent($contentId) {

        $this->contentId = $contentId;

        $content = DocContent::find($this->contentId);

        $this->contentTitle = $content->title;
        $this->contentEditorData = $content->content;

        $this->action = 'editcontent';      
        
        $this->dispatchBrowserEvent('initializeCKEditors',['editorIds' => ['contentEditorData']]);

    }




    
    public function viewContent($contentId,$parentId) {
        $this->action = 'viewcontent';
        $this->contentId = $contentId;

        $content = DocContent::find($this->contentId);

        $this->contentTitle = $content->title;
        $this->contentEditorData = $content->content;

        // if ($parentId) {
        //     $this->dispatchBrowserEvent('updateForContentAdd', ['tree' => $this->tree,'parentContentId' => $parentId]);
        // }        
    }














    public function insertDoc() {

        $validatedData = $this->validate(

            ['docTitle' => 'required|min:10'],
        );
        

        $propsDoc['user_id'] = Auth::id();
        $propsDoc['DocNo'] = '1000';
        $propsDoc['Revision'] = '1';
        $propsDoc['RevisionStatus'] = 'Verbatim';
        $propsDoc['Title'] = $this->docTitle;
        $propsDoc['Purpose'] = $this->docPurpose;
        $propsDoc['Scope'] = $this->docScope;




        // Create New Doc
        $doc = Doc::create($propsDoc);

        $this->docId = $doc->id;

        // Insert New Empty Tree
        $propsTree["user_id"] = Auth::id();
        $propsTree["doc_id"] = $this->docId;
        $propsTree["tree"] = json_encode([]);
        $doctree = Doctree::create($propsTree);

        //$this->action = 'viewdoc';

        return redirect()->to('/docs/'.$this->docId);
    }




    public function viewDoc()
    {
        $this->action = 'viewdoc';
    }




    public function insertContent($parentContentId)
    {
        $propsContent['user_id'] = Auth::id();
        $propsContent["doc_id"] = $this->docId;
        $propsContent["title"] = $this->contentTitle;
        $propsContent["content"] = $this->contentEditorData;

        $content = DocContent::create($propsContent);

        $this->contentId = $content->id;

        $childNode = ["id" => $this->contentId,"name" => $this->contentTitle];

        if (count($this->tree) == 0 || $parentContentId == 0) {
            array_push($this->tree,$childNode);
            $props['tree'] = json_encode($this->tree);
        } else {

            $this->addChildToArray($this->tree, $parentContentId, $childNode);
            $props['tree'] = json_encode($this->tree);
        }

        $this->tree = json_decode($props['tree']);

        Doctree::find($this->docId)->update($props);

        $this->action = 'viewcontent';

        $this->dispatchBrowserEvent('updateForContentInsert', ['tree' => $this->tree,'parentContentId' => $parentContentId]);
    }



    public function saveTree($tree)
    {

        $props['tree'] = json_encode($tree);

        Doctree::find($this->docId)->update($props);


        //dd($tree);
        //$props['tree'] = json_encode($tree);
        //Doctree::find($this->docId)->update($props);
    }

    public function editDoc()
    {
        $this->action = 'editdoc';
        $this->dispatchBrowserEvent('initializeCKEditors',['editorIds' => ['docPurpose','docScope']]);
    }



    public function updateDoc()
    {
        $propsDoc['Title'] = $this->docTitle;
        $propsDoc['Purpose'] = $this->docPurpose;
        $propsDoc['Scope'] = $this->docScope;

        //dd([$this->docPurpose,$this->docScope]);

        Doc::find( $this->docId)->update($propsDoc);

        $this->action = 'viewdoc';
    }







    public function updateContent($contentId)
    {
        $propsContent["title"] = $this->contentTitle;
        $propsContent["content"] = $this->contentEditorData;

        DocContent::find($contentId)->update($propsContent);

        $this->contentId = $contentId;

        // UPDATE TREE TITLE
        $this->doctree = Doctree::where("doc_id",$this->docId)->get()["0"];
        $oldtree = json_decode($this->doctree->tree,true);
        $this->tree = $this->updateNodeProperties($oldtree, $contentId,$propsContent["title"]);

        //dd([$contentId,$propsContent["title"],$this->tree]);

        $props['tree'] = json_encode($this->tree);

        Doctree::find($this->docId)->update($props);

        $this->action = 'viewcontent';

        $this->dispatchBrowserEvent('updateTree',['tree' => $this->tree]);
    }


    public function deleteContent($contentId) {
        // UPDATE TREE TITLE
        $this->doctree = Doctree::where("doc_id",$this->docId)->get()["0"];
        $this->tree = json_decode($this->doctree->tree,true);
        $this->remove_leaf_node($this->tree, $contentId);

        DocContent::find($contentId)->delete();

        $props['tree'] = json_encode($this->tree);

        Doctree::find($this->docId)->update($props);

        $this->action = 'viewdoc';

        $this->dispatchBrowserEvent('updateTree',['tree' => $this->tree]);
    }







    function addChildToArray(&$array, $parentId, $childArray) {
        foreach ($array as &$item) {
            if ($item['id'] == $parentId) {
                if (!isset($item['children'])) {
                    $item['children'] = array();
                }
                $item['children'][] = $childArray;
                return true;
            }
            if (isset($item['children'])) {
                $result = $this->addChildToArray($item['children'], $parentId, $childArray);
                if ($result) {
                    return true;
                }
            }
        }
        return false;
    }












    function updateNodeProperties($array, $id, $newTitle) {
        foreach ($array as $key => $node) {
            if ($node['id'] == $id) {
                // If the current node has the matching id, update its properties
                $array[$key]['name'] = $newTitle;
                return $array;
            } else if (isset($node['children'])) {
                // If the current node has children, recursively update them as well
                $array[$key]['children'] = $this->updateNodeProperties($node['children'], $id, $newTitle);
            }
        }
        return $array;
    }













    function remove_leaf_node(&$tree, $id) {
        // If the current node is the target leaf node, remove it and return its subtree
        foreach ($tree as $key => &$node) {
            if ($node['id'] === $id) {
                unset($tree[$key]);
                return $node;
            }
            // If the current node has children, recursively search for the target leaf node
            if (isset($node['children'])) {
                $removed = $this->remove_leaf_node($node['children'], $id);
                // If the target leaf node was found in a child subtree, remove the child if it has no children left
                if ($removed !== null && count($node['children']) === 0) {
                    unset($node['children']);
                }
                // Return the removed subtree
                return $removed;
            }
        }
        // If the target leaf node was not found, return null
        return null;
    }








}


























