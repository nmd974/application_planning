@extends('users.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show user</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Last Name:</strong>
                {{ $user->last_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $user->first_name }}
            </div>
        </div>        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Promotion:</strong>
                {{ $user->promotion }}
            </div>
        </div>        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Birthday:</strong>
                {{ $user->birthday }}
            </div>
        </div>        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>State:</strong>
                {{ $user->state }}
            </div>
        </div>        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {{ $user->role_id }}
            </div>
        </div>
  
    </div>
@endsection