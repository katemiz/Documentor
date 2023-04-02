<div class="section container">

    <header class="my-6">
        <h1 class="title has-text-weight-light is-size-1">My Docs</h1>
        <h2 class="subtitle has-text-weight-light">Documentation authored by me</h2>
    </header>

    {{-- NOTIFICATION --}}
    @if ($notification)
        <div class="notification {{$notification["type"]}} is-light">{!! $notification["message"] !!}</div>
    @endif

    <x-table-filter add="Add Doc" addlink="/docs" showsearch="{{$docs->total() > 0 ? true:false}}"/>

    @if ($docs->total() > 0)

        <!-- ************************ -->
        <!-- TABLE                    -->
        <!-- ************************ -->
        <table class="table is-fullwidth">

            <caption><b>{{ $docs->total() }}</b> {{ $docs->total() > 1 ? 'docs exist':'doc exists'}} in database</caption>

            <thead>
                <tr>

                    <th>
                        <span class="icon-text" wire:click="sortBy('title')">
                            <span class="icon {{ $sortDirection === 'asc' ? 'is-hidden' : ''}}">
                                <x-icon icon="arrow-up" fill="{{config('constants.icons.color.active')}}"/>
                            </span>
                            <span class="icon {{ $sortDirection === 'desc' ? 'is-hidden' : ''}}">
                                <x-icon icon="arrow-down" fill="{{config('constants.icons.color.active')}}"/>
                            </span>
                            <span>Doc Title</span>
                        </span>
                    </th>

                    <th class="is-2">
                        <span class="icon-text" wire:click="sortBy('created_at')">
                            <span class="icon {{ $sortTimeDirection === 'asc' ? 'is-hidden' : ''}}">
                                <x-icon icon="arrow-up" fill="{{config('constants.icons.color.active')}}"/>
                            </span>
                            <span class="icon {{ $sortTimeDirection === 'desc' ? 'is-hidden' : ''}}">
                                <x-icon icon="arrow-down" fill="{{config('constants.icons.color.active')}}"/>
                            </span>
                            <span>Date / Time</span>
                        </span>
                    </th>

                    <th class="has-text-right is-2">Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($docs as $doc)

                <tr>
                    <td><a href="/docs/{{$doc->id}}">{{ $doc->Title }}</a></td>
                    <td>{{ $doc->created_at }}</td>

                    <td class="has-text-right">
                        <a href="/docs/{{$doc->id}}" class="icon">
                            <x-icon icon="eye" fill="{{config('constants.icons.color.active')}}"/>
                        </a>
                    </td>
                </tr>

                @endforeach

            </tbody>

        </table>

        {{ $docs->links()}}

    @else
        <div class="notification is-warning is-light">No docs exist in database</div>
    @endif

</div>
