@extends('layoutAdmin.app')
@section('contentAdmin')

    <link rel="stylesheet" href="/style.css">
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="{{route('faire-depot')}}" method="post">
                    @method('post')
                    @csrf
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: white">
                            <strong>{{session("success")}}</strong>.
                            <form action="">
                                <button type="submit" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </form>
                        </div>
                    @endif
                    @if(session('erreur'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: white">
                            <strong>{{session("erreur")}}</strong>.
                            <form action="">
                                <button type="submit" class=" btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </form>
                        </div>
                    @endif
                    <h2>Faire Depot </h2>
                    <div class="inputbox">
                        <input type="text"  name="rib"  required>
                        <label for="">RIB Client</label>
                    </div>
                    <div class="inputbox">
                        <input name="montant" type="text" required>
                        <label for="">Montant</label>
                    </div>
                    <button type="submit" style="width: 100%;height: 40px;border-radius: 40px;color: darkblue;background: #fff;border: none;outline: none;cursor: pointer;font-size: 1em;font-weight: 600;">
                        Envoyé
                    </button>
                </form>
            </div>
        </div>
    </section>

    <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
    <script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>

@endsection
