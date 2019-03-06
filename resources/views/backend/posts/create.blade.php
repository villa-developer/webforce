@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-md-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5 class="title">Create Post</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['posts.store'], 'method' => 'post', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title post" id="blog-title" required>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="slug" id="blog-slug" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tags</label>
                                {!! Form::select('tags[]', $tags, '', ['class' => 'tags form-control', 'multiple' => 'multiple']) !!}
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="review" selected>Review</option>
                                    <option value="published" selected>Published</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Feature image</label>
                                <input type="file" class="form-control" name="feature_image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Body"></textarea>
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
