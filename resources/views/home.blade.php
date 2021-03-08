@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (App\Models\Post::all()->count()==0)
                <h4>You have no posts yet. <a href="/posts/create">Create</a> your first post.</h4>
            @else
                @foreach (App\Models\Post::orderBy('created_at', 'DESC')->get() as $post)
                    <div class="card">
                        <div class="card-header">
                            #{{ $post->id }}  {{ $post->title }} @ {{ $post->created_at }}

                            @auth
                                <a href="{{ route('posts.edit',[$post->id]) }}">[Edit]</a>
                            @endauth
                        </div>
                        <div class="card-body">
                            {!! nl2br($post->content) !!}
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
