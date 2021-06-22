@extends('layout.layout')

@section('content')
<div class="modal fade" id="create_activities" tabindex="-1" aria-labelledby="create_activitiesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_activitiesLabel">Créer une activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('activities.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="label">
                        <label>Libellé<span class="text-danger">*</span></label>
                    </div>
                    <legend>Début</legend>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Date de début</label>
                        <input type="date" class="form-control" id="start_date" name="start_date">
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Heure de début</label>
                        <input type="time" class="form-control" id="start_time" name="start_time">
                    </div>
                    <legend>Fin</legend>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Date de fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Heure de fin</label>
                        <input type="time" class="form-control" id="end_time" name="end_time">
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
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion des activités</h2>
        </div>
        <div class="pull-right">
            <button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_activities">
                <i class="fa fa-plus" aria-hidden="true"></i> Créer une activité
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
                <th scope="col">Début</th>
                <th scope="col">Fin</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($activities->count() > 0)
                @foreach ($activities as $u)
                <tr>
                    <td class="align-middle">{{ $u->label }}</td>
                    <td class="align-middle">{{ $u->start }}</td>
                    <td class="align-middle">{{ $u->end }}</td>
                    <td class="d-flex justify-content-around flex-wrap">
                        <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#{{"edit_activities_" . $u->id}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        
                        <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#{{"delete_activities_" . $u->id}}">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-primary me-4" data-bs-toggle="modal" data-bs-target="#{{"bookmark_activities_" . $u->id}}">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td class="align-middle" colspan="5">Vous n'avez pas d'activités enregistrées</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@endsection