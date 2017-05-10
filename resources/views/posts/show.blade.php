@extends ('layouts.layout')


@section ('content')

<h1>{{$post->title}}</h1>

{{ $post->body }}

<hr>
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

@endsection
