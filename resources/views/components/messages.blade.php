@if (flash()->message)
    <div class="alert alert-dismissible {{ flash()->class }}">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {{ flash()->message }}
    </div>
@endif
