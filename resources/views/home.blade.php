@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>Bienvenue</h1>
            @foreach($posts as $post)
                @if($post->status == 'Public')
                    <div class="card" style="width: 25rem;">
                        <img src="{{ $post->photo }}" class="card-img-top" alt="Photo de la publication">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a href="{{ route('edit.Post', ['id' => $post->id]) }}" class="btn btn-primary">Modifier</a>
                            <a href="{{ route('delete.Post', ['id' => $post->id]) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                    <br>
                @endif
            @endforeach
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@endsection


