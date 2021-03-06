@extends('layout.layout')
 
@section('title')
    Planning || Rôles
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

<!--Formulaire de recherche des rôles -->
{{-- <div class="mt-5 mb-5">
        <div class="mx-auto pull-right">
            <div class="">
                <form action="{{ route('roles.index') }}" method="GET" role="search">
                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search users">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="term" placeholder="Rechercher un rôle" id="term">
                        <a href="{{ route('roles.index') }}" class=" mt-1">
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

<div class="modal fade" id="create_roles" tabindex="-1" aria-labelledby="create_rolesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_rolesLabel">Créer un role</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('roles.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <label>Libellé<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="label">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="create">Créer</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>

<!-- *******************************************************************************************************************************-->
<!-- ZONE UPDATE AND DELETE -->
<!-- TABLE poste -->
<!-- *******************************************************************************************************************************-->
@if ($roles->count() > 0)
@foreach ($roles as $r)
<div class="modal fade" id="edit_roles_{{$r->id}}" tabindex="-1" aria-labelledby="edit_roles_{{$r->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_roles_{{$r->id}}Label">Modifier un role</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('roles.update', $r->id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <label>Libellé<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="label" value="{{ $r->label }}">
                    </div>
                    <input type="hidden" name="id" value="{{$r->id}}">
                    <input type="hidden" name="action" value="update">
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
<div class="modal fade" id="delete_roles_{{$r->id}}" tabindex="-1" aria-labelledby="delete_roles_{{$r->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_roles_{{$r->id}}Label">Suppression d'un role</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('roles.destroy', $r->id) }}">
                @method('DELETE')
                @csrf
                
                <div class="modal-body">
                    <p>Confirmez vous la suppression du role : {{$r->label }}</p> 
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
                    <h3>Gestion des rôles</h3>
                </div>
                <div>
                    <button type="button" class="btn btn-info mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_roles">
                        <i class="fa fa-plus" aria-hidden="true"></i> Créer une rôles
                    </button>
                </div>
            </div>
          </div>
@include('includes.message-block')
<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">Libellé</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($roles->count() > 0)
            @foreach ($roles as $r)
            <tr>
                <td class="align-middle">{{ $r->label }}</td>

                <td class="d-flex justify-content-around flex-wrap">
                    <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#{{"edit_roles_" . $r->id}}">
                        <i class="fas fa-pen"></i>
                    </button>
                    
                    <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#{{"delete_roles_" . $r->id}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="btn btn-info me-4" data-bs-toggle="modal" data-bs-target="#{{"bookmark_roles_" . $r->id}}">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="align-middle" colspan="5">Vous n'avez pas de roles enregistrées</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</div>
</div>
</div>

@endsection