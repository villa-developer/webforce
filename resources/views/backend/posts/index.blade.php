@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Mis Posts</h4>
                    <div class="text-right">
                        <a  href="{{ route('posts.create') }}" class="btn btn-primary">
                            + Create post
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Tags</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr id="model-{{ $post->id }}">
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>

                                        @foreach($post->tags as $tag)
                                            <span class="badge badge-info">
                                                <i class="fas fa-tag"></i>
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach

                                    </td>
                                <td>{{ $post->created_at->format('d-m-Y')}}</td>
                                    <td>
                                        <a href="/{{ $post->slug }}" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('posts.destroy', $post) }}" class="btn btn-sm btn-danger delete-model">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
