@extends('layoutAdmin.app')
@section('contentAdmin')

    <div class="cardBox ">
        <div class="card" >
            <div>
                <div class="cardName">Nombre de clients</div>
                <div class="numbers">{{$numberOfClients}}</div>
            </div>

            <div class="iconBx " >
                <ion-icon name="person"></ion-icon>
            </div>
        </div>

{{--        <div class="card">--}}
{{--            <div>--}}
{{--                <div class="numbers">80</div>--}}
{{--                <div class="cardName">Sales</div>--}}
{{--            </div>--}}

{{--            <div class="iconBx">--}}
{{--                <ion-icon name="cart-outline"></ion-icon>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="card">
            <div>
                <div class="numbers">0</div>
                <div class="cardName">Comments</div>
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
        </div>

        <div class="card "  >
            <div>
                <div>
                    <div class="numbers">{{$totalBalance}} FCFA</div>
                    <div class="cardName">Balance</div>
                </div>
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon>
            </div>
        </div>
    </div>
    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders" style="padding-top: 100px">
            <table>
                <thead style="background: var(--blue); color: var(--white); font-size: 25px">
                <tr>
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Email</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tbody >
                @foreach($listeU as $u)
                <tr>
                    <td>{{$u->user-> nom}}</td>
                    <td>{{$u->user-> prenom}}</td>
                    <td>{{$u->user-> email}}</td>
                    <td>
                        @if($u->statut == 'actif')
                            <form action="{{route('desactiver',$u->id)}}" method="post">
                                @method('put')
                                @csrf
                                <button class="test btn btn-danger" type="submit" >Désactiver</button>
                            </form>
                        @else
                            <form action="{{route('activer',$u->id)}}" method="post">
                                @method('put')
                                @csrf
                                <button  type="submit" class="test btn btn-warning" >Activer</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <style>
       .test{
           position: relative;
           padding: 5px 10px;
           background: var(--blue);
           text-decoration: none;
           color: var(--white);
           border-radius: 6px;
       }
       .test:hover{
           color: white;
       }
    </style>
@endsection

