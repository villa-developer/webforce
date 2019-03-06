@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-danger d-none" id="display-errors">
                <ul>
                </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit Post</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'put', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Title post" id="blog-title">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $post->slug }}" placeholder="slug" id="blog-slug">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tags</label>
                                {!! Form::select('tags[]', $tags, $post->tags, ['class' => 'tags form-control', 'multiple' => 'multiple']) !!}

                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Status</label>
                                {!! Form::select('status', ['review' => 'Review', 'published' => 'Published'], $post->status, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Feature image</label>
                                <input type="file" class="form-control" name="feature_image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Body">{{ $post->body }}</textarea>
                        </div>
                        <div class="col-md-12 pr-1 text-right">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
