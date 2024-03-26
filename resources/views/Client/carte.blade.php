@extends('layoutClient.app')
@section('contentClient')
<link rel="stylesheet" href="{{ asset('cssCarte/style.css') }}" />
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="card">
                        <form  method="post" action="{{ route('generate-cssCarte') }}">
                            @csrf
                            <div class="form-group">
                                <label for="montant">Montant à déduire :</label>
                                <input type="number" class="form-control" id="montant" name="montant" required>
                            </div>
                            <button type="submit" class="btn btn-outline-white offset-4">Générer la carte bancaire</button>
                        </form>
                    </div>
                </div>

                {{--Carte banquaire--}}
                <div class="container" id="carte-container">
                    <div class="card front-face">
                        <header>
                        <span class="logo">
                        <img src="{{ asset('cssCarte/images/logo.png') }}" alt="" />
                          <h5>Master Card</h5>
                        </span>
                            <img src="{{ asset('cssCarte/images/chip.png') }}" alt="" class="chip" />
                        </header>
                        <div class="card-details">
                            <div class="name-number">
                                <h6>Card Number</h6>
                                <h5 class="number">8050 2030 3020 5040</h5>
                                <h5 class="name">Prem Kumar Shahi</h5>
                            </div>

                            <div class="valid-date">
                                <h6>Valid Thru</h6>
                                <h5>05/28</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card back-face">
                        <h6>
                            Pour le service client, appelez le +221 782 90 48 30
                        </h6>
                        <span class="magnetic-strip"></span>
                        <div class="signature"><i>005</i></div>

                    </div>
                </div>
        </div>
    </div>

<script>
    document.getElementById('generate-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche le rechargement de la page

        // Affiche la section de la cssCarte
        document.getElementById('cssCarte-container').style.display = 'block';
    });
</script>
@endsection

