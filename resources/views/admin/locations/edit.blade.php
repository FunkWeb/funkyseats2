<x-app-layout>

    <h4>Editér {{ $location->name }}</h4>

    <form action="{{ route('admin.locations.update', $location) }}" method="post">
        @method('patch')
        @include('admin.locations._form')
        <button type="submit" class="btn btn-primary mt-2">Lagre Endringer</button>
    </form>

</x-app-layout>
