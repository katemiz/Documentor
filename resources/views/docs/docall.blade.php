<section class="section container">


    <script>

        let parentContentId

        let newNode = {
            name: 'New Content',
            id: 99999
        }

        let data = <?php echo json_encode($tree); ?>
        
        $(function() {
            $('#toc').tree({
                data: data,
                dragAndDrop: true
            });

            $('#toc').on(
                'tree.click',
                function(event) {
                    // The clicked node is 'event.node'
                    var node = event.node;

                    if (node.id != newNode.id) {
                        @this.viewContent(node.id,node.parent.id); 
                    }
                }
            );

            $('#toc').on(
                'tree.refresh',
                function(event) {
                    let newTree = $('#toc').tree('getTree').getData()
                    @this.saveTree(newTree); 
                }
            );
        });

        // DOC
        function jsEditDoc() {
            @this.editDoc(); 
        }

        function jsDeleteDoc() {
            @this.deleteDoc(); 
        }

        // CONTENT
        function jsAddContent(parentContentId) {
            @this.addContent(parentContentId);             
        }

        function jsEditContent(contentId) {
            @this.editContent(contentId); 
        }

        function jsDeleteContent(contentId) {

            let tree = $('#toc')
            let deleteNode = tree.tree('getNodeById', contentId)

            if (deleteNode.children.length > 0) {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'This content has child content. Please delete or move child content before deleting this content!',
                })

                return false
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteContent(contentId); 
                }        
            })   
        }

        window.addEventListener('updateTree', event => {
            $('#toc').tree('loadData', event.detail.tree);
        })

        window.addEventListener('updateForContentInsert', event => {

            let tree = $('#toc')
            tree.tree('loadData', event.detail.tree);

            if ( event.detail.parentContentId > 0) {
                let parentNode = tree.tree('getNodeById', event.detail.parentContentId);
                tree.tree('openNode', parentNode);
            }
        })

        window.addEventListener('updateForContentAdd', event => {

            parentContentId = event.detail.parentContentId

            let tree = $('#toc')

            $('#toc').tree('loadData', event.detail.tree);

            if (event.detail.parentContentId == 0) {

                tree.tree(
                    'appendNode',
                    newNode
                );

            } else {

                var parentNode = tree.tree('getNodeById', event.detail.parentContentId);

                tree.tree(
                    'appendNode',
                    newNode,
                    parentNode
                );

                tree.tree('openNode', parentNode);
            }

            if (document.getElementById('nocontent')) {
                document.getElementById('nocontent').classList.add('is-hidden')
            }
        })


        function loadCKEditor(idEditor) {

            ClassicEditor
                .create(document.querySelector('#'+idEditor))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set(idEditor, editor.getData());
                    })
                })
                .catch(error => {
                    console.error(error);
                });
        }



        window.addEventListener('initializeCKEditors',event => {

            event.detail.editorIds.forEach( (idEditor) => {
                loadCKEditor(idEditor)
            });
        })


        window.addEventListener('newContentTitle',event => {

            let tree = $('#toc')
            let node = tree.tree('getNodeById', newNode.id);

            tree.tree('updateNode', node, event.detail.contentTitle);
        })


        let isTreeOpen = false

        
        function expandCollapseTree() {


            let tree = $('#toc')

            isTreeOpen = !isTreeOpen



                
            let node = tree.tree('getTree');

            node.children.forEach((el) => {

                let child = tree.tree('getNodeById', el.id)

                if (isTreeOpen == 1) {
                    tree.tree('openNode', child);

                    document.getElementById('icon_expand').classList.add('is-hidden')
                    document.getElementById('icon_collapse').classList.remove('is-hidden')

                } else {
                    tree.tree('closeNode', child);

                    document.getElementById('icon_expand').classList.remove('is-hidden')
                    document.getElementById('icon_collapse').classList.add('is-hidden')

                }


            })






        }



        function formDocSubmit(action) {

            if (action == 'adddoc') {
                // ADD NEW CONTENT
                @this.insertDoc(); 

            } else {
                // UPDATE CONTENT
                @this.updateDoc(); 
            }
        }

        function formContentSubmit(contentId,action) {

            if (action == 'addcontent') {
                // ADD NEW CONTENT
                @this.insertContent(parentContentId); 

            } else {
                // UPDATE CONTENT
                @this.updateContent(contentId); 
            }
        }



        document.addEventListener('livewire:load', function () {

            if (document.getElementById('div_doc_form')) {
                loadCKEditor('docPurpose')
                loadCKEditor('docScope')
            }
        })
        



    </script>
    


    @switch($action)

        @case("adddoc")
        @case("editdoc")

            <h1 class="title has-text-weight-light is-size-1 has-text-left mb-6">{{$docId ? 'Edit Document':'New Document'}}</h1>
            @break

        @case("viewdoc")  
            <h1 class="title has-text-weight-light is-size-1 has-text-left mb-6">Document Properties [Cover Page]</h1>
            @break

        @case("viewcontent")
            <h1 class="title has-text-weight-light is-size-1 has-text-left mb-6">View Content</h1>
            @break

        @case("addcontent")
            <h1 class="title has-text-weight-light is-size-1 has-text-left mb-6">Add Content</h1>
            @break
        @case("editcontent")         
            <h1 class="title has-text-weight-light is-size-1 has-text-left mb-6">Edit Content</h1>
            @break

        @default
            <h1 class="title has-text-weight-light is-size-1 has-text-left">Problem !</h1>
            @break

    @endswitch



    <div class="columns">

        <input type="hidden" id="new_content_title" value="{{$contentTitle}}">

        <input type="hidden" id="hidden_tree" value="">


        <div class="column is-3 has-background-light" wire:ignore>

            @if (!$docId)
                <figure class="image is-inline-block" >
                    <img class="mt-3 mt-1-mobile pt-3 pt-1-mobile" src="/images/{{config('constants.app.app_footer_logo')}}" alt="App Logo">
                </figure>
            @else

                <div class="block">
                    <p class="heading has-text-grey">DOC PROPERTIES</p>
                    <div class="content">
                        <a wire:click="viewDoc()" class="button is-ghost is-small">Cover Page</a>
                    </div>
                </div>

                <div class="block">

                    <p class="heading has-text-grey">DOC CONTENT</p>

                    <div class="pl-3">

                        <div class="columns">
                            <div class="column is-4">
                                <a onclick="jsAddContent(0)" class="icon">
                                    <x-icon icon="plus" fill="{{config('constants.icons.color.active')}}"/>
                                </a>  
                            </div>

                            <div class="column has-text-right">
                                <a onclick="expandCollapseTree()" class="icon">
                                    <span id="icon_expand"><x-icon icon="arrow-up" fill="{{config('constants.icons.color.active')}}"/></span>
                                    <span id="icon_collapse" class="is-hidden"><x-icon icon="arrow-down" fill="{{config('constants.icons.color.active')}}"/></span>
                                </a>  
                            </div>
                        </div>

                        @if (count($tree) == 0)
                            <p id="nocontent">No content yet</p>
                        @endif

                        <div id="toc"></div>
                    </div>

                </div>

                <div class="block">
                    <p class="heading has-text-grey">APPENDIX</p>

                    <div class="content">
                        <ul>
                            <li>Attachments</li>
                        </ul>
                    </div>
                </div>

            @endif

        </div>          

        @switch($action)

            @case("adddoc")
            @case("editdoc")

                <div class="column" id="div_doc_form">

                    <div class="field">
                        <label class="label" for="dtitle">Doc Title</label>
                        <div class="control" id="dtitle">
                            <input class="input" type="text" wire:model="docTitle" id="docTitle" name="docTitle" value="{{$docTitle}}"  placeholder="Title of Document">
                        </div>

                        @error('docTitle')
                            <div class="notification is-warning is-light my-2">{{ $message }}</div>
                        @enderror      
                    </div>

                    <div class="field" wire:ignore>
                        <label class="label">Document Purpose</label>
                        <div class="column" wire:model="docPurpose" id="docPurpose">{!! $docPurpose !!}</div>
                    </div>

                    <div class="field" wire:ignore>
                        <label class="label">Document Scope</label>
                        <div class="column" wire:model="docScope" id="docScope">{!! $docScope !!}</div>
                    </div>

                    <div class="buttons is-right">
                        <button class="button is-link" onclick="formDocSubmit('{{$action}}')">{{ $docId ? 'Update' : 'Save New'}}</button>
                    </div>

                </div>

                @break

            @case("viewdoc")

                <div class="column">

                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">D{{$docNo}} R{{$docRevision}} [{{$docStatus}}]</p>
                        </header>
                        <div class="card-content">
                            <div class="content">

                                <div class="my-6">
                                    <p class="heading has-text-grey has-text-centered">DOCUMENT TITLE</p>
                                    <div class="is-size-2 has-text-weight-light has-text-centered has-text-info">{{ $docTitle }}</div>
                                </div>


                                <div class="my-6">
                                    <p class="heading has-text-grey has-text-centered">DOCUMENT PURPOSE</p>
                                    <div class="is-size-5 has-text-weight-light has-text-centered">{!! $docPurpose !!}</div>
                                </div>


                                <div class="my-6">
                                    <p class="heading has-text-grey has-text-centered">DOCUMENT SCOPE</p>
                                    <div class="is-size-5 has-text-weight-light has-text-centered">{!! $docScope !!}</div>
                                </div>

                            </div>
                        </div>
                        <footer class="card-footer">
                            <a onclick="jsEditDoc()" class="card-footer-item">Edit</a>
                            <a onclick="jsDeleteDoc()" class="card-footer-item">Delete</a>
                        </footer>
                    </div>

                </div>
               
                @break

            @case("viewcontent")

                <div class="column">

                    <div class="card is-fullwidth">
                        <header class="card-header">
                            <p class="card-header-title">{{$contentTitle}}</p>
                        </header>
                        <div class="card-content">
                            <div class="content">

                                <div class="my-6">
                                    <div class="is-size-4 has-text-weight-light has-text-centered">{!! $contentEditorData !!}</div>
                                </div>

                            </div>
                        </div>
                        <footer class="card-footer">
                            <a onclick="jsEditContent({{$contentId}})" class="card-footer-item">Edit</a>
                            <a onclick="jsAddContent({{$contentId}})" class="card-footer-item">Add Child Content</a>
                            <a onclick="jsDeleteContent({{$contentId}})" class="card-footer-item">Delete</a>
                        </footer>
                    </div>

                </div>

                @break

            @case("addcontent")
            @case("editcontent")

                <div class="column">
    
                    <div class="field">
                        <label class="label" for="title">Content Title</label>
                        <div class="control" id="title">
                            <input class="input" type="text" wire:model="contentTitle" id="contentTitle" name="contentTitle" value="{{$contentTitle}}"  placeholder="Content Title" wire:keydown="updateTreeTitle">
                        </div>
                    </div>
    
                    <div class="field" wire:ignore>
                        <label class="label">Content</label>
                        <div class="column" wire:model.defer="contentEditorData" name="contentEditorData" id="contentEditorData">{!!$contentEditorData!!}</div>
                    </div>

                    <div class="buttons is-right">
                        <button class="button is-link" type="submit" onclick="formContentSubmit('{{$contentId}}','{{$action}}')">{{ $contentId ? 'Update Content' : 'New Content'}}</button>
                    </div>
    
                </div>
                                        
                @break

            @default
                <p>Defulat</p>
                @break

                
        @endswitch


    </div>

</section>