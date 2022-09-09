<x-app-layout>

    <h4>Legg til ny lokasjon</h4>

    <form action="{{ route('admin.locations.store') }}" method="post">
        @include('admin.locations._form')
        <button type="submit" class="btn btn-success mt-2">Legg til</button>
    </form>

</x-app-layout>
