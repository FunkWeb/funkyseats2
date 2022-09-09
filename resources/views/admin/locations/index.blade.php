<x-app-layout>

    <h3>Oversikt over lokasjoner</h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Navn</th>
            <th>Antall ressurser</th>
        </tr>
        </thead>
        <tbody>
        @foreach($locations as $location)
            <tr>
                <td><a href="{{ route('admin.locations.show', $location) }}">{{ $location->name }}</a></td>
                <td>{{ $location->resources_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.locations.create') }}">Legg til ny lokasjon</a>

</x-app-layout>
