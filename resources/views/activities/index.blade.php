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
<!-- *******************************************************************************************************************************-->
<!-- ZONE UPDATE AND DELETE -->
<!-- TABLE poste -->
<!-- *******************************************************************************************************************************-->
@if ($activities->count() > 0)
@foreach ($activities as $u)
<div class="modal fade" id="edit_activities_{{$u->id}}" tabindex="-1" aria-labelledby="edit_activities_{{$u->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_activities_{{$u->id}}Label">Modifier une activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('activities.update', $u->id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="label" value="{{ $u->label }}">
                        <label>Libellé<span class="text-danger">*</span></label>
                    </div>
                    <legend>Début</legend>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Date de début</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ date("Y-m-d", strtotime($u->start)) }}">
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Heure de début</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="{{ date("H:i", strtotime($u->start)) }}">
                    </div>
                    <legend>Fin</legend>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Date de fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"  value="{{ date("Y-m-d", strtotime($u->end)) }}">
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Heure de fin</label>
                        <input type="time" class="form-control" id="end_time" name="end_time"  value="{{ date("H:i", strtotime($u->end)) }}">
                    </div>
                    <input type="hidden" name="id" value="{{$u->id}}">
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
{{-- <div class="modal fade" id="edit_activity" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_activities_Label">Modifier une activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="post" action="{{ route('activities.update', $u->id) }}">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="label" value="">
                        <label>Libellé<span class="text-danger">*</span></label>
                    </div>
                    <legend>Début</legend>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Date de début</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="">
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Heure de début</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="">
                    </div>
                    <legend>Fin</legend>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">Date de fin</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"  value="">
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Heure de fin</label>
                        <input type="time" class="form-control" id="end_time" name="end_time"  value="">
                    </div>
                    <input type="hidden" name="id" value="">
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
</div> --}}
<!-- *******************************************************************************************************************************-->
<!-- *******************************************************************************************************************************-->
<div class="modal fade" id="delete_activities_{{$u->id}}" tabindex="-1" aria-labelledby="delete_activities_{{$u->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_activities_{{$u->id}}Label">Suppression d'une activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('activities.destroy', $u->id) }}">
                @method('DELETE')
                @csrf
                
                <div class="modal-body">
                    <p>Confirmez vous la suppression de l'activité : {{$u->label }}</p> 
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
<div class="d-flex justify-content-between">
    <div>
        <h2>Gestion des activités</h2>
    </div>
    <div>
        <button type="button" class="btn btn-success mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target="#create_activities">
            <i class="fa fa-plus" aria-hidden="true"></i> Créer une activité
        </button>
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
                    <button type="button" class="btn btn-success me-4" data-id={{$u->id}} data-action="update" data-bs-toggle="modal" data-bs-target="#{{"edit_activities_" . $u->id}}">
                        <i class="fas fa-pen"></i>
                    </button>
                    
                    <button type="button" class="btn btn-danger me-4" data-id={{$u->id}} data-action="delete" data-bs-toggle="modal" data-bs-target="#{{"delete_activities_" . $u->id}}">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    
                    <a href="{{route("useractivities.show" , $u->id)}}">
                        <button type="button" class="btn btn-primary me-4">
                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                        </button>
                    </a>
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

<script>
    var btn = document.querySelectorAll(".table-responsive tbody tr td button");
    console.log("test");
    btn.forEach(element => {
        console.log(element);
        element.addEventListener('click', (e) => {
            var id = element.getAttribute("data-id");
            var action = element.getAttribute("data-action");
            console.log(id);
            if(action === "update"){
                let xhr = new XMLHttpRequest();
                xhr.open("GET", `http://127.0.0.1:80/activities/${id}`);
                xhr.responseType = "json";
                xhr.send();
                xhr.onload = function(){
                    if (xhr.status != 200){ 
                        alert("Erreur " + xhr.status + " : " + xhr.statusText);
                    }else{ 
                        console.log(xhr.response);

                    }
                };
                xhr.onerror = function(){
                    alert("La requête a échoué");
                };
                xhr.onprogress = function(event){
                    if (event.lengthComputable){
                        alert(event.loaded + " octets reçus sur un total de " + event.total);
                    }
                };
            }else{

            }
            
        })
    })
    </script>
    @endsection