@extends('layout')

@section('content')

<h1>Créer un Post</h1>
<br>

<form action="/new_post" method="POST" class="row g-3">
    {{ csrf_field() }}
    <div class="col-12">
        <label for="inputAddress" class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" id="inputText" placeholder="Titre">
    </div>

    <div class="col-12">
        <label for="inputAddress2" class="form-label">Contenu</label>
        <textarea name="content" class="form-control" id="inputTextarea2" placeholder="Contenu" rows="5"></textarea>
    </div>

    <div class="col-12">
        <label for="formFile" class="form-label">Photo</label>
        <input class="form-control" name="photo" type="file" id="formFile">
    </div>

    <div class="col-12">
        <label for="inputState" class="form-label">Statut</label>
        <select id="inputState" name="status" class="form-select">
            <option selected>Public</option>
            <option>Private</option>
        </select>
    </div>
    
    <div class="col-12">
        <button type="submit" class="btn btn-primary">PUBLIER</button>
    </div>
</form>

@endsection