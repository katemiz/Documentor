<x-app-layout>

    <section class="section container">

    <script src="{{ asset('/js/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/ckeditoradd.js') }}"></script>



    <h1 class="title has-text-weight-light is-size-1 has-text-left">New Doc</h1>




    <form action="{{ $doc ? '/docupdate/'.$doc->id : '/docadd/' }}" method="POST" enctype="multipart/form-data">
        @csrf

            <div class="box">

                <div class="field">
                    <label class="label" for="title">Doc Title</label>
                    <div class="control" id="title">
                        <input class="input" type="text" name="title" value="{{$doc ? $doc->title: ''}}" placeholder="Title of Document">
                    </div>
                </div>


                <div class="field" id="ck">
                    <input type="hidden" name="purpose" id="ckeditor" value="{{$doc ? $doc->purpose : ''}}">
                    <label class="label">Purpose</label>
                    <div class="column" id="editor">{!!$doc ? $doc->purpose: ''!!}</div>
                </div>


                <div class="field" id="ck">
                    <input type="hidden" name="scope" id="ckeditor2" value="{{$doc ? $doc->scope : ''}}">
                    <label class="label">Scope</label>
                    <div class="column" id="editor2">{!!$doc ? $doc->scope: ''!!}</div>
                </div>




                <div class="buttons is-right">
                    <button class="button is-link">{{ $doc ? 'Update' : 'Save New'}}</button>
                </div>

            </div>

        </form>
    
        <script>

            loadCKEditor('editor','ckeditor')
            loadCKEditor('editor2','ckeditor2')

        </script>

    </section>

</x-app-layout>