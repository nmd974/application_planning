@extends('layout.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Label</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('useractivities.create') }}"> Ajouter une association</a>
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
            <th>Label</th>
            <th>Day</th>
            <th>user_id</th>
            <th>activity_id</th>

            <th width="250px">Actions</th>
        </tr>
        @foreach ($useractivities as $user)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $user->label }}</td>
            <td>{{ $user->role_id }}</td>
            <td>
                <form action="{{ route('useractivities.destroy',$user->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('useractivities.show',$user->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('useractivities.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection