@extends('layouts.front')

@section('content')

    <div class="container m-5">

        <div class="row">
            <div class="card-columns">
                @foreach($posts as $post)
                    <div class="card">
                        <img src="{{ asset($post->feature_image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            Author: <a href="{{ route('user', $post->user->id) }}">{{ $post->user->full_name }}</a><br>
                            ({{ $post->created_at->format('M-d-Y') }})<br>

                            @foreach($post->tags as $tag)
                                <a href="{{ route('tag', $tag->slug) }}"><span class="badge badge-info">{{ $tag->name }}</span></a>
                            @endforeach


                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
