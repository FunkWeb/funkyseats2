<x-app-layout>

    <h3>Legg til ny ressurs i {{ $location->name }}</h3>

    <form action="{{ route('admin.resources.store', $location) }}" method="post">

        @include('admin.resources._form')

        <button type="submit" class="btn btn-success mt-4">Legg til</button>
    </form>

</x-app-layout>
