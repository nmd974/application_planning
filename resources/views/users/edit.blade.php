@extends('layout.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier un utilisateur</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   z
        <div class="alert alert-danger">
            <strong>Oops!</strong> Une erreur est survenue.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
     <!-- Formulaire de modification d'user -->
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom</strong>
                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" placeholder="Nom">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prénom</strong>
                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" placeholder="Prénom">
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
                    <strong>Date de naissance</strong>
                    <input type="date" name="birthday" value="{{ $user->birthday }}" class="form-control" placeholder="date de naissance">
                </div>
            </div>                 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Rôle</strong>
                    <select name="role_id" class="form-control">
                @foreach($roles as $role)
                <option value='{{ $role->id }}'>{{ $role->label }}</option>
                @endforeach
                </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
   
    </form>
@endsection