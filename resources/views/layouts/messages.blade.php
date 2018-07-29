@if (Session::has('message'))
<div class="form-group">
    <div class="alert alert-warning">
        {{ Session::get('message') }}
    </div>
</div>
@endif
