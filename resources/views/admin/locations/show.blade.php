<x-app-layout>

    <h3>Lokasjon - {{ $location->name }}</h3>

    <p>{{ $location->description }}</p>

    <a href="{{ route('admin.locations.edit', $location) }}">Editér {{ $location->name }}</a>

    <h4 class="mt-4">Oversikt over ressurser:</h4>

    <table class="table table-striped" id="resources">
        <thead>
        <tr>
            <th>Plass</th>
            <th>Type</th>
            <th>Status</th>
            <th>Handliger</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resources as $resource)
            <tr>
                <td>{{ $resource->name }}</td>
                <td>{{ $resource->type->name }}</td>
                <td>{{ $resource->status }}</td>
                <td>
                    <a href="{{ route('admin.resources.edit', [$location, $resource]) }}">Editér</a>


                    <a href="#">Slett</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.resources.create', $location) }}">Legg til ny ressurs</a>

</x-app-layout>
