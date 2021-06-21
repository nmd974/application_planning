@extends('users.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit user</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Une erreur est survenue.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom</strong>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" placeholder="last_name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom</strong>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" placeholder="first_name">
                </div>
            </div>            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Adresse mail</strong>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="email">
                </div>
            </div>            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Promotion</strong>
                    <input type="text" name="promotion" value="{{ $user->promotion }}" class="form-control" placeholder="promotion">
                </div>
            </div>            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Anniversaire</strong>
                    <input type="text" name="birthday" value="{{ $user->birthday }}" class="form-control" placeholder="birthday">
                </div>
            </div>            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Etat</strong>
                    <input type="text" name="state" value="{{ $user->state }}" class="form-control" placeholder="state">
                </div>
            </div>            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rôle</strong>
                    <input type="text" name="role_id" value="{{ $user->role_id }}" class="form-control" placeholder="role_id">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
   
    </form>
@endsection