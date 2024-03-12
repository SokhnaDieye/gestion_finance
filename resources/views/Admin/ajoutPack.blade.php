@extends('layoutAdmin.app')
@section('contentAdmin')

    <link rel="stylesheet" href="/style.css">
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="{{route('ajout-pack')}}" method="post">
                    @method('post')
                    @csrf
                    <div class="session-alerts">
                        @if(session('success'))
                            <strong>{{session("success")}}</strong>.
                        @endif
                    </div>
                    <h2>Ajout Pack </h2>
                    <div class="inputbox">
                        <input type="text"  name="nom" required>
                        <label for="">Nom Pack</label>
                    </div>
                    <div class="inputbox">
                        <input name="limite_transaction" type="number" required>
                        <label for="">Limite Transaction</label>
                    </div>
                    <div class="inputbox">
                        <input name="deduction_mensuelle" type="number" required>
                        <label for="">Deduction Mensuelle</label>
                    </div>
                    <button type="submit" style="width: 100%;height: 40px;border-radius: 40px;color: darkblue;background: #fff;border: none;outline: none;cursor: pointer;font-size: 1em;font-weight: 600;">
                        Enregisté
                    </button>
                </form>
            </div>
        </div>
    </section>

<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
<script src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>

@endsection
