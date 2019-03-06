@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tags</h4>
                    <div class="text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tagModal">
                                + Create tag
                            </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr>
                                <th>name</th>
                                <th>Created at</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="tags">
                            @foreach($tags as $tag)
                                <tr id="model-{{ $tag->id }}">
                                    <td><span class="badge badge-primary tag-name" >{{ $tag->name }}</span></td>
                                    <td>{{ $tag->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('tags.show', $tag) }}" class="btn btn-sm btn-info get-tag" data-toggle="modal" data-target="#update-tag-modal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('tags.destroy', $tag) }}" class="btn btn-sm btn-danger delete-model">
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

    <div class="modal fade" id="tagModal" tabindex="-1" role="dialog" aria-labelledby="tagModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tagModalTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger d-none" id="display-errors">
                        <ul>

                        </ul>
                    </div>

                    {!! Form::open(['route' => 'tags.store', 'id' => 'form-tags', 'class' => 'form-tags']) !!}
                        <div class="form-group">
                            <label>Tag</label>
                            <input type="text" class="form-control" name="name" placeholder="Tag" required>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="update-tag-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => ['tags.update', 1], 'method' => 'PUT', 'id' => 'form-update-tag']) !!}
                    <div class="form-group">
                        <label>Tag</label>
                        <input type="text" class="form-control" name="name" id="update-tag" placeholder="Tag" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
