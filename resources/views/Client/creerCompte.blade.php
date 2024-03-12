@extends('layoutClient.app')
@section('contentClient')

    <div class="cardBox">
        <div class="container">
            <h1>compte banquaire</h1>
            <form action="{{route('creer-compte')}}" method="post" enctype="multipart/form-data">
                @method('post')
                @csrf
                <label>Type de compte</label>
                <select class="form-select" id="typeCompte" name="typeCompte" required>
                    <option value="courant">Compte Courant</option>
                    <option value="epargne">Compte Épargne</option>
                </select>
                <label>Numéro Carte d identité Nationnal </label>
                <input  name="cin" type="text">
                <label>Photo</label>
                <input  name="photo" type="file">
                <label for="id">Choisir un pack</label>
                <select name="pack_id" id="pack_id"  class="form-control">
                    <option value="" disabled selected> Sélectionner un pack</option>
                    @foreach ($packs as $pack)
                        <option value="{{ $pack->id }}">{{ $pack->nom }}</option>
                    @endforeach
                </select>
                <button type="submit" class="button">Enregisté</button>
            </form>
        </div>
    </div>

@endsection
