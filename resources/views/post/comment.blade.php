@if (count($post->comments) > 0)
    <hr>
<div class="comments">
    <ul class="list-group">
        @foreach ($post->comments as $comment)
            <li class="list-group-item"><strong> {{ $comment->created_at->diffForHumans() }}:
                </strong> {{ $comment->body }}</li> @endforeach
    </ul>
</div>
@endif


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
    </div>
</div>
