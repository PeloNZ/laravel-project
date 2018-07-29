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

            @include ('post.comment')

        @include ('layouts.errors')

    </div>

@endsection
