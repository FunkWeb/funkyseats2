<x-app-layout>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <img src="{{ $user->avatar_path }}" class="img-fluid rounded img-thumbnail" alt="Profile picture">
        </div>
        <div class="col-sm">
            <div class="display-5">{{ $user->name }}</div>
            <div>Siste aktivitet for x timer siden, er for øyeblikket
                <span class="text-success fw-semibold">sjekket inn</span>.
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-auto">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>

</x-app-layout>
