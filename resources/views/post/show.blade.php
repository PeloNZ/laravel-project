@extends ('layouts.main') @section ('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <p class="blog-post-meta">
            {{ $post->created_at }} by {{ $post->user->name }}
        </p>

        {{ $post->body }}

        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item"><strong> {{ $comment->created_at->diffForHumans() }}:
                            &nbsp; </strong> {{ $comment->body }}</li> @endforeach
            </ul>
        </div>

        @auth
        <div class="actions">
             {{--TODO confirm deletion --}}
            <form method="POST" action="{{ route('deletePost', ['id' => $post->id]) }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit">Delete</button>
            </form>
        </div>
        @endauth

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
