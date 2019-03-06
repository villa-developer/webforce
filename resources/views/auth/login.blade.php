@extends('layouts.front')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6 m-5">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
