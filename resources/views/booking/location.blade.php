<x-app-layout>

    <h3>Reserver en plass i {{ $location->name }}</h3>
    <h4>Dato: {{ $date }}</h4>

    <p>{{ $location->description }}</p>

    <p>For å reservere en plass, trykk på knappen "Reserver". For å avbooke en reservert plass, trykk på knappen
        igjen.</p>

    <div class="form-group">
        Velg dato:
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Plass</th>
            <th class="d-none d-lg-table-cell">Beskrivelse</th>
            <th>Tilgjengelig 0830-1200</th>
            <th>Tilgjengelig 1200-1530</th>
        </tr>
        </thead>
        <tbody>
        @foreach($resources as $resource)
            <tr>
                <td>{{ $resource->name }}</td>
                <td class="d-none d-lg-table-cell">{{ $resource->description }}</td>
                <td>
                    @if($resource->active)
                    <form>
                        @csrf

                        <button class="btn btn-info w-100">Reserver</button>
                    </form>
                    @else
                        <button class="btn btn-warning w-100 disabled">Ikke tilgjengelig</button>
                    @endif
                </td>
                <td>
                    @if($resource->active)
                        <form>
                            @csrf

                            <button class="btn btn-info w-100">Reserver</button>
                        </form>
                    @else
                        <button class="btn btn-warning w-100 disabled">Ikke tilgjengelig</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

</x-app-layout>
