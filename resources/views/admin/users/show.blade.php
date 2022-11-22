<x-app-layout>
    <div class="row mb-2">
        <div class="col-sm-auto">
            <img src="{{ $user->avatar_path }}" class="img-fluid rounded img-thumbnail" alt="Profile picture">
        </div>
        <div class="col-sm">
            <div class="display-5">{{ $user->name }}</div>
            <div>Siste aktivitet var {{ $user->last_online }}, er for øyeblikket
                @if($user->checked_in)
                    <span class="text-success fw-semibold">sjekket inn</span>.
                @else
                    <span class="text-warning fw-semibold">sjekket ut</span>.
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            @include('admin.users._sidebar')
        </div>
        <div class="col-sm">
            @include('admin.users._tabs')
        </div>
    </div>

    @push('head')
        <x-datatables></x-datatables>
    @endpush

</x-app-layout>
