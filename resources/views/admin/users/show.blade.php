<x-app-layout>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <img src="{{ $user->avatar_path }}" class="img-fluid rounded img-thumbnail" alt="Profile picture">
        </div>
        <div class="col-sm">
            <div class="display-5">{{ $user->name }}</div>
            <div>Siste aktivitet var {{ $user->last_active_at->diffForHumans() }}, er for øyeblikket
                <span class="text-success fw-semibold">sjekket inn</span>.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
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
                    {{ $user->last_active_at->diffForHumans() }}
                </li>

            </ul>
        </div>
        <div class="col-sm">
            <h4>Kommende reservasjoner:</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Dato</th>
                    <th>Plass</th>
                    <th>Fra kl</th>
                    <th>Til kl</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>13.04.2022</th>
                    <td>Klasserommet - sete 4</td>
                    <td>09:30</td>
                    <td>15:00</td>
                </tr>
                <tr>
                    <th>14.04.2022</th>
                    <td>Klasserommet - sete 4</td>
                    <td>09:30</td>
                    <td>15:00</td>
                </tr>
                <tr>
                    <th>15.04.2022</th>
                    <td>Klasserommet - sete 4</td>
                    <td>09:30</td>
                    <td>15:00</td>
                </tr>
                <tr>
                    <th>18.04.2022</th>
                    <td>Klasserommet - sete 4</td>
                    <td>09:30</td>
                    <td>15:00</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
