@extends ('layouts.main') @section ('content')

<h1>Create post</h1>

<form method="POST" action="/post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label> <input type="text"
            class="form-control" id="title" placeholder="Title"
            name="title">
    </div>
    <div class="form-group">
        <label for="body">Body</label> <input type="textarea"
            class="form-control" id="body" placeholder="Body"
            name="body">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Publish</button>
    </div>

    <!-- validation -->
    @include ('layouts.errors')

</form>

@endsection
