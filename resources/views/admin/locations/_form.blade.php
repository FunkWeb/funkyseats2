@csrf

<div class="form-group">
    <label for="name" class="form-label mt-4">Navn</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp"
           placeholder="Navn på lokasjonen" value="{{ old('name', $location->name) }}">
    @error('name')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="descriptionTextarea" class="form-label mt-4">Beskrivelse av lokasjonen</label>
    <textarea class="form-control" id="descriptionTextarea" name="description"
              rows="3">{{ old('description', $location->description) }}</textarea>
    @error('description')
    <small class="form-text text-danger">{{ $message }}</small>
    @enderror
</div>
