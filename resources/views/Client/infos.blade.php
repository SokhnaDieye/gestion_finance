@extends('layoutClient.app')
@section('contentClient')
<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="card profile-card-2">

                    @foreach($comptes as $compte)
                    <div class="card-body pt-5">
                        <img src="{{ asset('storage/imageClient/' . $compte->photo) }}" class="card-img-top"
                             alt="Photo du Client">
                        <h2 class="card-title">{{$compte->user->prenom}} {{$compte->user->nom }}</h2>
                    </div>
                    <div class="card-body border-top border-light">
                        <div class="media align-items-center">
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p class="card-text"><strong>Email:</strong> {{ $compte->user->email }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p class="card-text"><strong>RIB:</strong> {{ $compte->rib }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p class="card-text"><strong>Type de Compte:</strong> {{ $compte->typeCompte }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <p class="card-text"><strong>Pack:</strong> {{ $compte->pack->nom }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media align-items-center">
                            <div class="media-body text-left ml-3">
                                <div class="progress-wrapper">
                                    <h1 class="card-text"><strong>Solde:</strong> {{ $compte->solde }} FCFA</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="media align-items-center">
                    <div class="media-body text-left ml-3">
                        <div class="progress-wrapper">
                            <a class="" href="{{route('pageCreerCompte')}}"><strong>Créer un autre compte</strong> </a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-lg-8">
                @if(session('erreurBloquer'))
                    <div class="alert text-danger alert-dismissible fade show" role="alert">
                        <strong>{{session("erreurBloquer")}}</strong>
                    </div>
                @endif
                @if(session('erreurCompte'))
                    <div class="alert text-danger alert-dismissible fade show" role="alert">
                        <strong>{{session("erreurCompte")}}</strong>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session("success")}}</strong>.

                    </div>
                @endif
                @if(session('erreur'))
                    <div class="alert text-danger alert-dismissible fade show" role="alert">
                        <strong>{{session("erreur")}}</strong>.
                    </div>
                @endif
                    @if(session('erreurMontant'))
                    <div class="alert text-danger alert-dismissible fade show" role="alert">
                        <strong>{{session("erreurMontant")}}</strong>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                            <li class="nav-item">
                                <i class="icon-user"></i> <span class="hidden-xs">Faire Une Transaction</span>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="">
                                <form action="{{route('faire-transaction',$compte->id)}}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="form-group row">
                                        <label for="rib_destination" class="col-lg-3 col-form-label form-control-label">RIB du Compte de Destination</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="rib_destinataire" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="montant" class="col-lg-3 col-form-label form-control-label">Montant</label>
                                        <div class="col-lg-9">
                                            <input type="number" name="montant" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button type="submit" class="btn btn-outline-white btn-block">Effectuer la Transaction</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-12">
                                    <h2 class="text-center mb-4">Détails des Transactions</h2>
                                    <table class="table table-bordered transactions-table">
                                        <thead class="bg-secondary">
                                        <tr>
                                            <th>Date</th>
                                            <th>Montant</th>
                                            <th>Nature</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($compte->transactions()->latest()->take(5)->get() as $transaction)
                                            <tr class="{{ $transaction->type === 'debit' ? 'text-danger' : 'text-white' }}">
                                                <td>{{ $transaction->created_at }}</td>
                                                <td>{{ $transaction->montant }} F CFA</td>
                                                <td>{{ $transaction->type }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
