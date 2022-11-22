<h4>Kommende reservasjoner:</h4>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Dato</th>
        <th>Plass</th>
        <th>Periode</th>
        <th>Handlinger</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
    <tr>
        <th>{{ $booking->date }}</th>
        <td>{{ $booking->resource->location->name }} - {{ $booking->resource->name }}</td>
        <td>{{ $booking->period }}</td>
        <td>
            <form method="post" action="{{ route('booking.destroy', $booking) }}">
                @csrf
                @method('delete')
                <input type="hidden" name="period" value="{{ $booking->period }}">
                <input type="hidden" name="date" value="{{ $booking->date }}">
                <button type="submit" class="btn btn-warning w-100">Fjern</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
