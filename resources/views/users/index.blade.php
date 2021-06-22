@extends('users.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestion des utilisateurs</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Créer un nouvel utilisateur</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Adresse mail</th>
            <th>Promotion</th>
            <th>Anniversaire</th>
            <th>Etat</th>
            <th>Role</th>

            <th width="280px">Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->promotion }}</td>
            <td>{{ $user->birthday }}</td>
            <td>
            @if ($user->state ==1)
            actif
            @endif
            </td>
            <td>{{ $user->role_id }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection