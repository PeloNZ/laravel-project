@extends ('layouts.main') @section ('content')

    <div class="blog-post">
        <h2 class="blog-post-title">{{ $post->title }}</h2>
        <div class="blog-post-meta">
            <span id="created">Posted {{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</span>
            @if ($post->updated_at > $post->created_at)
                <span id="updated"> | Last updated {{ $post->updated_at->diffForHumans() }}</span>
        @endif
        @auth
                {{--TODO confirm deletion --}}
                <form class="form-inline" method="POST" action="{{ route('deletePost', ['id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <div id="edit-link"><a href="{{ route('editPost', ['id' => $post->id]) }}">Edit</a></div>
                    <button type="submit" class="btn btn-link">Delete</button>
                </form>
                </span>
            @endauth

            </div>

            {{ $post->body }}

            <hr>

            <div class="comments">
                <ul class="list-group">
                    @foreach ($post->comments as $comment)
                        <li class="list-group-item"><strong> {{ $comment->created_at->diffForHumans() }}:
                            </strong> {{ $comment->body }}</li> @endforeach
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
