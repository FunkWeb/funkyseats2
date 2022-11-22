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
{{--            <th>Handlinger</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($latest_checkins as $checkin)
            <tr>
                <td><span title="{{ $checkin->checkin_at->format('Y-m-d H:i:s') }}">
                        {{ $checkin->checkin_at->translatedFormat('l d. F') }}
                    </span></td>
                <td>{{ $checkin->checkin_at->format('H:i') }}</td>
                <td>
                    @if($checkin->checkout_at)
                        {{ $checkin->checkout_at->format('H:i') }}
                        {{ $checkin->forced_checkout ? '*' : ''}}
                    @endif
                </td>
                <td>{{ intdiv($checkin->total_time, 60).':'. ($checkin->total_time % 60)  }}</td>
{{--                <td>--}}
{{--                    @if(!$checkin->checkout_at)--}}
{{--                        <button type="submit" class="btn btn-warning">Sjekk ut</button>--}}
{{--                    @endif--}}
{{--                </td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>* Automatisk utsjekket</div>
@endif
