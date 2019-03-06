@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-danger d-none" id="display-errors">
                <ul >
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit account</h5>
                </div>
                <div class="card-body">
                    {!! Form::model( $user, ['route' => ['users.update', $user->id], 'method' => 'put', 'class' => 'ajaxForm']) !!}
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}">
                            </div>
                        </div>

                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-12 pr-1 text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
