

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



@endsection