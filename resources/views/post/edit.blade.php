@extends ('layouts.main') @section ('content')

<h1>Edit post</h1>

<form method="POST" action="/post/{{ $post->id }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="form-group">
        <label for="title">Title</label> <input type="text"
            class="form-control" id="title" placeholder="Title"
            name="title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="body">Body</label> <input type="textarea"
            class="form-control" id="body" placeholder="Body"
            name="body" value="{{ $post->body }}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Update</button>
    </div>

    <!-- validation -->
    @include ('layouts.errors')

</form>

@endsection
