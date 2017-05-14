@extends ('layouts.layout')


@section ('content')

<h1>{{$post->title}}</h1>

<p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#">
    {{ $post->user->name }}
</a></p>

{{ $post->body }}

@if (count($post->tags))
    <p>Tags: </p>

    <ul>
        @foreach ($post->tags as $tag)
            <li>
                <a href="/posts/tags/{{ $tag->name }}">
                {{ $tag->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif


<hr>

@include('posts.comment')

@endsection
