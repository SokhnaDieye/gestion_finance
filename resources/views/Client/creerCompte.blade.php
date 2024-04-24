@extends('layoutClient.app')
@section('contentClient')
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                                <i class="icon-user"></i> <span class="hidden-xs">compte banquaire</span>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="">
                                <form action="{{route('creer-compte')}}" method="post" enctype="multipart/form-data">
                                    @method('post')
                                    @csrf
                                    <div class="form-group row">
                                        <label for="rib_destination" class="col-lg-3 col-form-label form-control-label">Type de compte</label>
                                        <div class="col-lg-9">
                                            <select class="form-control @error('typeCompte') is-invalid @enderror" id="typeCompte" name="typeCompte" required>
                                                <option disabled selected>Sélectionner un Compte</option>
                                                <option value="courant">Compte Courant</option>
                                                <option value="epargne">Compte Épargne</option>
                                            </select>
                                            @error('typeCompte')
                                            <div class="invalid-feedback">
                                                <p style="font-size: 20px" class="text-danger">Vous avez déja un compte courant</p>
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="montant" class="col-lg-3 col-form-label form-control-label">Numéro Carte d identité Nationnal</label>
                                        <div class="col-lg-9">
                                            <input  name="cin" type="text"  class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="montant" class="col-lg-3 col-form-label form-control-label"> Photo</label>
                                        <div class="col-lg-9">
                                            <input  name="photo" type="file" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="montant" class="col-lg-3 col-form-label form-control-label"> Choisir un pack</label>
                                        <div class="col-lg-9">
                                            <select name="pack_id" id="pack_id"  class="form-control">
                                                <option value="" disabled selected> Sélectionner un pack</option>
                                                @foreach ($packs as $pack)
                                                    <option value="{{ $pack->id }}">{{ $pack->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn btn-outline-white btn-block">Enregisté</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
