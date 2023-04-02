<tr id="{{$prefix}}{{$dbfile->id}}">
    <td>{{$dbfile->filename}}</td>
    <td>{{$dbfile->size}}</td>
    <td>{{$dbfile->mimetype}}</td>
    <td data-name="buttons">
        <span class="icon" onclick="removeFile('{{$prefix}}',{{$dbfile->id}})">
            <x-icon icon="delete" fill="{{config('constants.icons.color.danger')}}"/>
        </span>

        <span class="is-hidden icon" onclick="removeFile('{{$prefix}}',{{$dbfile->id}})">
            <x-icon icon="undo" fill="{{config('constants.icons.color.active')}}"/>
        </span>
    </td>
</tr>
