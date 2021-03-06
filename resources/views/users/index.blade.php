@extends('layout.layout')

@section('title')
    Planning || Utilisateurs
@endsection

@section('content')
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

<!--Formulaire de recherche des utilisateurs -->
{{-- <div class="mt-5 mb-5">
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('users.index') }}" method="GET" role="search">
                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search users">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Rechercher un utilisateur" id="term">
                        <a href="{{ route('users.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

<div class="modal fade" id="create_users" tabindex="-1" aria-labelledby="create_usersLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_usersLabel">Créer un utilisateur</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <strong>Nom</strong>
                        <input type="text" name="last_name" class="form-control" placeholder="Nom">
                    </div>

                    <div class="mb-3">
                        <strong>Prénom</strong>
                        <input type="text" name="first_name" class="form-control" placeholder="Prénom">
                    </div>
                    <div class="mb-3">
                        <strong>Adresse mail</strong>
                        <input type="text" name="email" class="form-control" placeholder="Adresse mail">
                    </div>

                    <div class="mb-3">
                        <strong>Promotion</strong>
                        <select name="promotion_id" class="form-control">
                            @foreach($promotions as $promotion)
                            <option value='{{ $promotion->id }}'>{{ $promotion->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <strong>Date de naissance</strong>
                        <input type="date" name="birthday" class="form-control" placeholder="Date de naissance">
                    </div>
                    <div class="mb-3">
                        <strong>Rôle</strong>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                            <option value='{{ $role->id }}'>{{ $role->label }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success" name="create">Créer</button>
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- *******************************************************************************************************************************-->
<!-- ZONE UPDATE AND DELETE -->
<!-- TABLE poste -->
<!-- *******************************************************************************************************************************-->
@if ($users->count() > 0)
@foreach ($users as $u)
<div class="modal fade" id="edit_users_{{$u->id}}" tabindex="-1" aria-labelledby="edit_users_{{$u->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_users_{{$u->id}}Label">Modifier un utilisateur</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('users.update', $u->id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <strong>Nom</strong>
                        <input type="text" name="last_name" class="form-control" placeholder="Nom" value="{{$u->last_name }}">
                    </div>

                    <div class="mb-3">
                        <strong>Prénom</strong>
                        <input type="text" name="first_name" class="form-control" placeholder="Prénom" value="{{$u->first_name }}">
                    </div>
                    <div class="mb-3">
                        <strong>Adresse mail</strong>
                        <input type="text" name="email" class="form-control" placeholder="Adresse mail" value="{{$u->email }}">
                    </div>

                    <div class="mb-3">
                        <strong>Promotion</strong>
                        <select name="promotion_id" class="form-control">
                            @foreach($promotions as $promotion)
                            <option value='{{ $promotion->id }}'>{{ $promotion->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <strong>Date de naissance</strong>
                        <input type="date" name="birthday" class="form-control" placeholder="Date de naissance" value="{{$u->birthday}}">
                    </div>
                    <div class="mb-3">
                        <strong>Rôle</strong>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                            <option value='{{ $role->id }}'>{{ $role->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="update">Modifier</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
<!-- *******************************************************************************************************************************-->
<!-- *******************************************************************************************************************************-->
<div class="modal fade" id="delete_users_{{$u->id}}" tabindex="-1" aria-labelledby="delete_users_{{$u->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_users_{{$u->id}}Label">Suppression d'un utilisateur</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('users.destroy', $u->id) }}">
                @method('DELETE')
                @csrf

                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'utilisateur : {{$u->last_name }}</p>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="delete">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif
<div class="row">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <h3>Gestion des utilisateurs</h3>
                </div>
                <div>
                    <button type="button" class="btn btn-info mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_users">
                        <i class="fa fa-plus" aria-hidden="true"></i> Créer une utilisateurs
                    </button>
                </div>
            </div>
          </div>
@include('includes.message-block')
<div class="table-responsive">
    <!-- tableau affichage utilisateur -->
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Adresse mail</th>
                <th scope="col">Promotion</th>
                <th scope="col">Anniversaire</th>
                <th scope="col">Etat</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count() > 0)
            @foreach ($users as $u)
            <tr>
                <td class="align-middle">{{ ++$i }}</td>
                <td class="align-middle">{{ $u->last_name }}</td>
                <td class="align-middle">{{ $u->first_name }}</td>
                <td class="align-middle">{{ $u->email }}</td>
                <td class="align-middle">{{ App\Models\Promotion::where(['id' => $u->promotion_id])->get('label')[0]->label }}</td>
                <td class="align-middle">{{ $u->birthday }}</td>
                <td class="align-middle">
                    @if ($u->state ==1)
                    actif
                    @else
                    inactif
                    @endif
                </td>
                <td class="align-middle">{{ App\Models\Role::where(['id' => $u->role_id])->get('label')[0]->label }}</td>

                <td class="d-flex justify-content-around flex-wrap">
                    <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#{{"edit_users_" . $u->id}}">
                        <i class="fas fa-pen"></i>
                    </button>

                    <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#{{"delete_users_" . $u->id}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>

                    @csrf
                    @method('DELETE')
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="align-middle" colspan="10">Vous n'avez pas d'utilisateur enregistrées</td>
            </tr>
            @endif
            </td>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

@endsection