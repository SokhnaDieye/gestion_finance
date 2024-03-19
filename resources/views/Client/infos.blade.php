@extends('layoutClient.app')
@section('contentClient')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        @foreach($comptes as $compte)
            <div class="col-md-4 mb-4">
                <div class="card client-card">
                    <img src="{{ asset('storage/imageClient/' . $compte->photo) }}" class="card-img-top"
                         alt="Photo du Client">
                    <div class="card-body">
                        <h5 class="card-title">{{ $compte->user->name }}</h5>
                        <p class="card-text"><strong>Email:</strong> {{ $compte->user->email }}</p>
                        <p class="card-text"><strong>RIB:</strong> {{ $compte->rib }}</p>
                        <p class="card-text"><strong>Type de Compte:</strong> {{ $compte->typeCompte }}</p>
                        <p class="card-text text-primary"><strong>Solde:</strong> {{ $compte->solde }} F CFA</p>
                        <p class="card-text"><strong>Pack:</strong> {{ $compte->pack->nom }}</p>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#modalTransaction">
                            Faire une Transaction
                        </button>
                    </div>
                </div>
            </div>
{{--Detail transaction--}}
            {{--<div class="col-md-8">
                <h2 class="text-center mb-4">Détails des Transactions</h2>
                <table class="table table-bordered transactions-table">
                    <thead class="bg-secondary">
                    <tr>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($compte->transactions as $transaction)
                        <tr class="{{ $transaction->type === 'debit' ? 'text-danger' : 'text-success' }}">
                            <td>{{ $transaction->created_at }}</td>
                            <td>{{ $transaction->montant }} F CFA</td>
                            <td>{{ $transaction->type }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>--}}
        @endforeach
    </div>
</div>
{{--Effectuer  une transaction--}}
<div class="modal fade" id="modalTransaction" tabindex="-1" role="dialog"
     aria-labelledby="modalTransactionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTransactionLabel">Effectuer une Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{route('faire-transaction',$compte->id)}}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="rib_destination">RIB du Compte de Destination</label>
                        <input type="text" name="rib_destinataire" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="montant">Montant</label>
                        <input type="number" name="montant" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Effectuer la Transaction</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

@if(session('success') || session('erreur'))
    <div class="session-alerts">
        @if(session('success'))
            <strong>{{session("success")}}</strong>
            <form action="">
                <button type="submit" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </form>
        @endif
        @if(session('erreur'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session("erreur")}}</strong>.
                <form action="">
                    <button type="submit" class=" btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </form>
            </div>
        @endif
    </div>
@endif

@endsection
