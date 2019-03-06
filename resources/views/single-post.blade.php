@extends('layouts.front')

@section('content')

    <div class="container-fluid">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('posts-media/'.$post->feature_image) }}" class="w-100" >
                </div>
            </div>
        </div>
    </div>

    <div class="container m-5">

        <div class="row">
            <div class="col-md-12 text-center">
                <h1>{{ $post->title }} <span> ( {{$post->created_at->format('d-M-Y')}} ) </span></h1>
                <h4>Author: {{$post->user->name}}</h4>
            </div>

            <div class="col-md-12">
                @foreach($post->tags as $tag)
                    <a href="{{ route('tag', $tag->name) }}">
                        <span class="badge badge-primary">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </div>

            <div class="col-md-12">
                 {{ $post->body }}
            </div>

        </div>
    </div>

@endsection
