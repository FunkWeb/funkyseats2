<x-app-layout>

    <h3>Reserver en plass i {{ $location->name }} - {{ $date }}</h3>

    <p>{{ $location->description }}</p>

    <p class="text-muted">For å reservere en plass, trykk på knappen "Reserver". For å avbooke en reservert plass, trykk på knappen
        igjen.</p>

    <div class="form-group">
        Velg dato:
        <ul>
            @foreach($nextdays as $selectdate)
                <li>
                    <a
                        @if($selectdate[0] == $date)
                            class="fw-bold"
                        @endif
                        href="{{ route('booking.index', [$location, $selectdate[0]]) }}">{{ $selectdate[1] }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Plass</th>
            <th class="d-none d-lg-table-cell">Beskrivelse</th>
            <th class="text-center">0830-1200</th>
            <th class="text-center">1200-1530</th>
{{--            <th class="text-center">Hele dagen</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($resources as $resource)
            <tr>
                <td>{{ $resource->name }}</td>
                <td class="d-none d-lg-table-cell">{{ $resource->description }}</td>
                <td>
                    @if($resource->active)
                            <?php $booked = $resource->booked($date, '1') ?>
                        @if($resource->booked($date, '1'))
                            @include('booking.button.occupied', ['period' => '1', 'booked' => $booked])
                        @else
                            @include('booking.button.available', ['period' => '1'])
                        @endif
                    @else
                        @include('booking.button.unavaiable')
                    @endif
                </td>
                <td>
                    @if($resource->active)
                        <?php $booked = $resource->booked($date, '2') ?>
                        @if($booked)
                            @include('booking.button.occupied', ['period' => '2', 'booked' => $booked])
                        @else
                            @include('booking.button.available', ['period' => '2'])
                        @endif
                    @else
                        @include('booking.button.unavaiable')
                    @endif
                </td>
{{--                <td>--}}
{{--                    @if($resource->active)--}}
{{--                        <form method="post">--}}
{{--                            @csrf--}}
{{--                            <button class="btn btn-success w-100">Reserver</button>--}}
{{--                        </form>--}}
{{--                    @else--}}
{{--                        <button class="btn btn-warning w-100 disabled">Ikke tilgjengelig</button>--}}
{{--                    @endif--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>

    </table>
</x-app-layout>
