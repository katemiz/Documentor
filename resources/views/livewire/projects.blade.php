<section class="section container">





    @switch($action)

        @case("addproject")
        @case("editproject")


            <div class="column" id="div_project_form">


                <header class="my-6">
                    <h1 class="title has-text-weight-light is-size-1">{{ $projectId ? 'Edit Project' : 'New Project'}}</h1>
                    <h2 class="subtitle has-text-weight-light">{{ $projectId ? 'Edit Project Attributes' : 'Create New Project'}}</h2>
                </header>



                <div class="field">
                    <label class="label" for="pcode">Project Code</label>
                    <div class="control" id="pcode">
                        <input class="input" type="text" wire:model="projectCode" id="projectCode" name="projectCode" value="{{$projectCode}}"  placeholder="Project Code">
                    </div>

                    @error('projectCode')
                        <div class="notification is-warning is-light my-2">{{ $message }}</div>
                    @enderror      
                </div>


                <div class="field">
                    <label class="label" for="ptitle">Doc Title</label>
                    <div class="control" id="ptitle">
                        <input class="input" type="text" wire:model="projectTitle" id="projectTitle" name="projectTitle" value="{{$projectTitle}}"  placeholder="Title of Project">
                    </div>

                    @error('projectTitle')
                        <div class="notification is-warning is-light my-2">{{ $message }}</div>
                    @enderror      
                </div>


                <div class="field" wire:ignore>
                    <label class="label">Project Scope</label>
                    <div class="column" wire:model="projectScope" id="projectScope">{!! $projectScope !!}</div>
                </div>

                <div class="buttons is-right">
                    <button class="button is-link" onclick="formDocSubmit('{{$action}}')">{{ $projectId ? 'Update' : 'Save New'}}</button>
                </div>

            </div>

            @break

    @endswitch







</section>
