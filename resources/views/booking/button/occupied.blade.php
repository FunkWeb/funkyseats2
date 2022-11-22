@if($booked->user_id == auth()->id())
    <form method="post" action="{{ route('booking.destroy', $booked) }}">
        @csrf
        @method('delete')
        <input type="hidden" name="period" value="{{ $period }}">
        <input type="hidden" name="date" value="{{ $date }}">
        <button type="submit" class="btn btn-info w-100">Fjern reservasjon</button>
    </form>
@else
    <button class="btn btn-danger w-100 disabled">Opptatt</button>
@endif
