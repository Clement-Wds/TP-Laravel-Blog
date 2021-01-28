@extends('layout')

@section('content')

<h1>Les Utilisateurs de Larablog</h1>
<br>

@foreach($users as $user)
    <div class="card">
        <h5 class="card-header">{{ $user->firstname }} {{ $user->lastname }}</h5>
        <div class="card-body">
            <p class="card-text">{{ $user->email }}</p>
            <a href="{{ route('profile.User', ['id' => $user -> id]) }}" class="btn btn-primary">Voir le Profil</a>
        </div>
        <p class="card-footer text-muted"">Membe depuis {{ $user->created_at }}</p>
    </div>
    <br>   
@endforeach

@endsection