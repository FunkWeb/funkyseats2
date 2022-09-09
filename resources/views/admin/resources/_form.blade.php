@csrf

<div class="form-group">
    <label for="name" class="form-label mt-4">Navn</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
           placeholder="Plassnavn på ressursen" value="{{ old('name', $resource->name) }}">
    @error('name')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="descriptionTextarea" class="form-label mt-4">Beskrivelse av lokasjonen</label>
    <textarea class="form-control" id="descriptionTextarea" name="description"
              rows="3">{{ old('description', $resource->description) }}</textarea>
    @error('description')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="typeSelect" class="form-label mt-4">Ressurstype</label>
    <select class="form-select" id="typeSelect" name="type_id">
        @foreach($resource_types as $type)
            <option value="{{ $type->id }}"
                    @if($resource->resource_type_id == $type->id) selected @endif>{{ $type->name }}
            </option>
        @endforeach
    </select>
    @error('type_id')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
