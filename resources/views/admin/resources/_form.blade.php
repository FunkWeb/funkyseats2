@csrf

<div class="form-group">
    <label for="name" class="form-label mt-4">Navn</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
           placeholder="Plassnavn på ressursen" value="{{ old('name', $resource->name) }}">
    @error('name')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
