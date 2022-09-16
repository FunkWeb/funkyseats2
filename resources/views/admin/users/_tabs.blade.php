<ul class="nav nav-tabs mb-2" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" data-bs-toggle="tab" href="#reservations" aria-selected="true" role="tab">
            Kommende Reservasjoner</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#checkins" aria-selected="false" role="tab" tabindex="-1">
            Siste innsjekkinger</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" data-bs-toggle="tab" href="#activity" aria-selected="false" role="tab" tabindex="-1">
            Aktivitet</a>
    </li>
</ul>

<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active show" id="reservations" role="tabpanel">
        @include('admin.users._reservations')
    </div>

    <div class="tab-pane fade" id="checkins" role="tabpanel">
        @include('admin.users._table_checkins')
    </div>

    <div class="tab-pane fade" id="activity" role="tabpanel">
        @include('admin.users._activity')
    </div>
</div>



