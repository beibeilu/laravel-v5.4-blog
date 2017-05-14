<div class="comments">
    <ul class="list-group">
    @foreach ($post->comments as $comment)
        <li class="list-group-item">
            <strong>{{ $comment->created_at->diffForHumans() }}</strong></br>
            {{ $comment->body}}
        </li>
    @endforeach
    </ul>
</div>

{{-- Add a Comment --}}

<div class="panel panel-default">
      <div class="panel-heading">
            <h3 class="panel-title">Add a Comment</h3>
      </div>
      <div class="panel-body">
          <form method="POST" action="/posts/{{$post->id}}/comments">
                 {{-- {{ method_field('PATCH') }} --}}
                 {{ csrf_field() }}

                <div class="form-group">
                    <textarea name="body" placeholder ="Your comment here." class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
          </form>

          @include ('layouts.errors')

      </div>

</div>
