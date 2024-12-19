@extends('partials.layout')
@section('content')
<div class="flex justify-center">
    {{ $posts->links() }}
</div>
<div class="grid-cols-4 grid gap-4">
    @foreach($posts as $post)
    <div>
        <div class="card bg-base-100 shadow-xl min-h-full">
            @if($post->image)
            <figure>
                <img src="{{ $post->image }}"
                    alt="Shoes" />
            </figure>
            @endif
            @if(isset($title))
            <h1>Posts tagged with "{{ $title }}"</h1>
            @endif

            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p>{{ $post->snippet }}</p>
                <div class="flex flex-row">
                    <div class="basis-1/2">
                        <div class="tooltip w-fit" data-tip="{{ $post->created_at }}">
                            <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    @if($post->created_at->notEqualTo($post->updated_at))
                    <div class="basis-1/2 text-right">
                        <div class="tooltip w-fit" data-tip="{{ $post->updated_at }}">
                            <p class="text-neutral-content">Edited</p>
                        </div>
                    </div>
                    @endif
                </div>

                <p class="text-neutral-content"><a href="{{route('user', ['user' => $post->user])}}">{{ $post->user->name }}</a></p>
                <p class="text-neutral-content"><a href="{{route('category', ['category' => $post->category])}}">{{ $post->category->name }}</a></p>

                <p class="text-neutral-content">Comments: {{ $post->comments_count }}</p>
                <p class="text-neutral-content">Likes: {{ $post->likes_count }}</p>
                <form action="{{ route('like', ['post' => $post]) }}" method="POST">
                    @csrf
                    @if($post->authHasLiked)
                    <button class="btn btn-secondary">Unlike</button>
                    @else
                    <button class="btn btn-primary">Like</button>
                    @endif
                </form>
                <div class="flex flex-wrap gap-1">
                    @foreach ($post->tags as $tag)
                    <div class="badge badge-primary badge-outline">{{$tag->name}}</div>
                    @endforeach
                </div>
                <div class="card-actions justify-end">
                    <a href="{{route('post', ['post'=>$post])}}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection