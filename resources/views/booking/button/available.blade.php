<form method="post" action="{{ route('booking.store', $resource) }}">
    @csrf
    <input type="hidden" name="period" value="{{ $period }}">
    <input type="hidden" name="date" value="{{ $date }}">
    <button type="submit" class="btn btn-success w-100">Reserver</button>
</form>
