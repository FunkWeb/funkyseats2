<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="fw-semibold">Status:</span>
        @if($user->checked_in)
            <span class="badge bg-success rounded-pill">Sjekket inn</span>
        @else
            <span class="badge bg-warning rounded-pill">Ikke på kontoret</span>
        @endif
    </li>
    <li class="list-group-item">
        <span class="fw-semibold">Plass:</span><br>
        Klasserommet - Plass 3
    </li>
    <li class="list-group-item">
        <span class="fw-semibold">Siste aktivitet:</span><br>
        {{ $user->last_online }}
    </li>
    <li class="list-group-item">
        <span class="fw-semibold">Tid sjekket inn siste 7 dager:</span><br>
        6 timer og 43 minutter<br>
        <small>Snittid for en uke er 35 timer</small>
    </li>

</ul>
