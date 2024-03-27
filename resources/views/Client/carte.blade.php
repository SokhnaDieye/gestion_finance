@extends('layoutClient.app')
@section('contentClient')
<link rel="stylesheet" href="{{ asset('cssCarte/style.css') }}" />
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        @if(session('erreur'))
                            <div class="alert text-danger alert-dismissible fade show" role="alert">
                                <strong>{{session("erreur")}}</strong>.
                            </div>
                        @endif
                        <form  method="post" action="{{ route('generate-Carte') }}">
                            @csrf
                            <div class="form-group">
                                <label for="montant">Montant sur la carte</label>
                                <input type="number" class="form-control" id="montant" name="montant" required>
                            </div>
                            <button type="submit" class="btn btn-outline-white offset-4">Générer la carte bancaire</button>
                        </form>
                    </div>
                </div>

                {{--Carte banquaire--}}
                <div class="" id="">
                    <a  class="btn btn-outline-white offset-4" href="{{route('showcartes')}}">Voir mes Cartes</a>
                </div>

@endsection

