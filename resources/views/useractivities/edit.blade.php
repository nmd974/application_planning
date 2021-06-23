@extends('layout.layout')

@section('content')
<div class="modal fade" id="create_activities" tabindex="-1" aria-labelledby="create_activitiesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_activitiesLabel">Créer une activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('useractivities.store') }}">
                @csrf
                <div class="modal-body">
                    <legend>{{ $userActivity->label }}</legend>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="label">
                        <label>Libellé<span class="text-danger">*</span></label>
                    </div>
                    <div class="mb-3">
                        <label for="day" class="form-label">Date</label>
                        <input type="date" class="form-control" id="day" name="day">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="users" id="users_select">
                            @if ($users)
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ucfirst($user->first_name) }} {{ucfirst($user->last_name) }}</option>
                            @endforeach
                            @else
                            <option selected>Veuillez ajouter des utilisateurs</option>
                            @endif
                        </select>
                        <input type="hidden" name="id" value="{{ $userActivity->id }}">
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

<div class="d-flex justify-content-between">
    <div>
        <h2>{{$userActivity->label}}</h2>
    </div>
    <div>
        <button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_activities">
            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter un utilisateur
        </button>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th class="align-middle">Utilisateur</th>
                <th class="align-middle">Retirer</th>
            </tr>
        </thead>
        <tbody>
            @if (count($tableauUsers) > 0)
            @foreach ($tableauUsers as $user)
            <tr>
                <td class="align-middle">{{ $user }}</td>
                <td class="d-flex justify-content-around flex-wrap">
                    <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#{{"delete_activities_" . $userActivity->id}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
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