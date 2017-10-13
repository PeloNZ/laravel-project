@extends ('layouts.main') @section ('content')

<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">
        {{ $post->created_at }} by <a href="#">Mark</a>
    </p>

    {{ $post->body }}

    <hr>

    <div class="comments">
        <ul class="list-group">
            @foreach ($post->comments as $comment)
            <li class="list-group-item"><strong> {{ $comment->created_at->diffForHumans() }}: &nbsp; </strong> {{ $comment->body }}</li> @endforeach
        </ul>
    </div>

    <hr>

    <!-- Add a comment. -->
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/post/{{ $post->id }}/comment">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="Add a comment" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Add comment</button>
                </div>
            </form>

            @include ('layouts.errors')
        </div>
    </div>


</div>

@endsection
