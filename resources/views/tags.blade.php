@extends('layouts.front')

@section('content')

    <div class="container m-5">

        <div class="row">
            <ul class="list-group">
                @foreach($tags as $tag)
                    <li class="list-group-item">
                        <a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
