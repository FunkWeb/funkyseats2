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
            @include('admin.users._sidebar')
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

            @include('admin.users._table_checkins')
        </div>
    </div>

</x-app-layout>
