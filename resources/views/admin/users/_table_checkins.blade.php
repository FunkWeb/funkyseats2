<h4>Siste innsjekkinger <small>(maks 10)</small>:</h4>

@if($latest_checkins->count() == 0)
    {{ $user->name }} har ikke sjekket inn enda.
@else
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Dato</th>
            <th>Sjekket inn kl.</th>
            <th>Sjekket ut kl.</th>
            <th>Total tid innsjekket</th>
        </tr>
        </thead>
        <tbody>
        @foreach($latest_checkins as $checkin)
            <tr>
                <td><span title="{{ $checkin->checkin_at->format('Y-m-d H:i:s') }}">
                        {{ $checkin->checkin_at->translatedFormat('l d. F') }}
                    </span></td>
                <td>{{ $checkin->checkin_at->format('H:i') }}</td>
                <td>{{ $checkin->checkout_at ? $checkin->checkout_at->format('H:i') : '' }}</td>
                <td>{{ $checkin->total_time }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
