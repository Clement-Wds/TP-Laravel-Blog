@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Mon Profil</h1>

            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">Bonjour {{ $user->firstname }} {{ $user->lastname }}</h5>
                    <p class="card-text">Voici votre magnifique profil !</p>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Votre Prénom : <b>{{ $user->firstname }}</b></li>
                    <li class="list-group-item">Votre Nom : <b>{{ $user->lastname }}</b></li>
                    <li class="list-group-item">Votre Email : <b>{{ $user->email }}</b></li>
                </ul>

                <div class="card-footer text-muted">
                    Membre depuis {{ $user->created_at }}
                </div>

                <div class="card-body">
                    <a href="{{ url('/edit_profile') }}" class="btn btn-primary">Modifier</a>
                    <a href="{{ url('/change_password') }}" class="btn btn-secondary">Modifier mon mot de passe</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer mon Compte</button>
                    
                    <!-- Message de confirmation de suppression -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer votre compte</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><b>{{ $user->firstname }} {{ $user->lastname }}</b></p>
                                    <p>Etes vous sûr de vouloir nous quitter maintenant ? Vous ne pourrez plus publier de contenu !</p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">RESTER</button>
                                    <a href="{{ url('delete_profile') }}" class="btn btn-danger">SUPPRIMER DEFINITIVEMENT MON COMPTE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <h1>Mes Publications</h1>
            @foreach($post as $posts)
                @if($posts->user_id == $user->id)
                    <div class="card" style="width: 25rem;">
                        <img src="{{ $posts->photo }}" class="card-img-top" alt="Photo de la publication">
                        <div class="card-body">
                            <h5 class="card-title">{{ $posts->title }}</h5>
                            <p class="card-text">{{ $posts->content }}</p>
                            <a href="{{ route('edit.Post', ['id' => $posts->id]) }}" class="btn btn-primary">Modifier</a>
                            <a href="{{ route('delete.Post', ['id' => $posts->id]) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                    <br>
                @endif            
            @endforeach
        </div>
    </div>
</div>

@endsection