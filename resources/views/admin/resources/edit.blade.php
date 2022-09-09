<x-app-layout>

    <h3>Editér {{ $resource->name }}</h3>

    <form action="{{ route('admin.resources.update', [$location, $resource]) }}" method="post">
        @method('patch')
        @include('admin.resources._form')

        <div class="form-group mt-2">
                <div class="form-check form-switch">
                    <input class="form-check-input" name="active" type="checkbox" id="active"
                           @if($resource->active) checked @endif>
                    <label class="form-check-label" for="active">Er ressursen tilgjengelig?</label>
                </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Lagre endringer</button>
    </form>

</x-app-layout>
