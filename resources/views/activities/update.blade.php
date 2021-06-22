@extends('layout.layout')

@section('content')
@include('includes.message-block')

@if ($activity)

<div class="d-flex flex-column justify-content-center align-items-center">

    <h1>Créer une activité</h1>

    <form method="post" action="{{ route('activities.store') }}">

        @csrf

        <div class="mb-3 d-flex flex-column justify-content-start">

            <label for="label" class="form-label">Libellé</label>

            <input type="text" class="form-control" id="label" placeholder="Entretien technique" value="{{ $activity->label }}">
            
        </div>

        <div class="row">

            <div class="col-md-6 col-12">
            
                <label for="start_date" class="form-label">Date de début</label>

                <input type="date" class="form-control" id="start_date" value="{{ date("d/m/Y", $activity->start) }}">
            
            </div>

            <div class="col-md-6 col-12">
            
                <label for="start_time" class="form-label">Heure de début</label>

                <input type="time" class="form-control" id="start_time" value="{{ date("H:i", $activity->start) }}">
            
            </div>
        
        </div>

        <div class="row">

            <div class="col-md-6 col-12">
            
                <label for="end_date" class="form-label">Date de fin</label>

                <input type="date" class="form-control" id="end_date" value="{{ date("d/m/Y", $activity->end) }}">
            
            </div>

            <div class="col-md-6 col-12">
            
                <label for="end_time" class="form-label">Heure de fin</label>

                <input type="time" class="form-control" id="end_time" value="{{ date("H:i", $activity->end) }}">
            
            </div>
        
        </div>

        <button type="button" class="btn btn-danger">Annuler</button>

        <button type="submit" class="btn btn-success">Créer</button>
        
        <input type="hidden" name="_token" value="{{ Session::token() }}">

    </form>

</div>
    
@endif

@endsection