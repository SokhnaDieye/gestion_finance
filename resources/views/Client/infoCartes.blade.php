@extends('layoutClient.app')

@section('contentClient')
    <link rel="stylesheet" href="{{ asset('cssCarte/style.css') }}" />
    <div class="content-wrapper">
        <div class="container" id="carte-container">
            @foreach ($cartes as $carte)
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
                            <h5 class="number">{{ $carte->numero_carte }}</h5>
                            <h5 class="name"> CVV {{ $carte->cvv }}</h5>
                        </div>

                        <div class="valid-date">
                            <h6>Date d'expiration</h6>

                            <h5>{{ $carte->date_expiration }}</h5>
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
            @endforeach
        </div>
    </div>
@endsection



{{--<div class="content-wrapper">--}}
{{--    <div class="container" id="carte-container">--}}
{{--        @foreach ($cartes as $carte)--}}
{{--            <div class="card front-face">--}}
{{--                <header>--}}
{{--                    <span class="logo">--}}
{{--                        <img src="{{ asset('cssCarte/images/logo.png') }}" alt="" />--}}
{{--                        <h5>Master Card</h5>--}}
{{--                    </span>--}}
{{--                    <img src="{{ asset('cssCarte/images/chip.png') }}" alt="" class="chip" />--}}
{{--                </header>--}}
{{--                <div class="card-details">--}}
{{--                    <div class="name-number">--}}
{{--                        <h6>Card Number</h6>--}}
{{--                        <h5 class="number">{{ $carte->numero_carte }}</h5>--}}
{{--                        <h5 class="name"> CVV {{ $carte->cvv }}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="valid-date">--}}
{{--                        <h6>Date d'expiration</h6>--}}
{{--                        <h5>{{ $carte->date_expiration }}</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card back-face">--}}
{{--                <h6>--}}
{{--                    Pour le service client, appelez le +221 782 90 48 30--}}
{{--                </h6>--}}
{{--                <span class="magnetic-strip"></span>--}}
{{--                <div class="signature"><i>005</i></div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
{{--<style>--}}
{{--    /* Import Google Font - Poppins */--}}
{{--    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");--}}

{{--    * {--}}
{{--        margin: 0;--}}
{{--        padding: 0;--}}
{{--        box-sizing: border-box;--}}
{{--        font-family: "Poppins", sans-serif;--}}
{{--    }--}}
{{--    section {--}}
{{--        position: relative;--}}
{{--        min-height: 100vh;--}}
{{--        width: 100%;--}}
{{--        background: #121321;--}}
{{--        display: flex;--}}
{{--        align-items: center;--}}
{{--        justify-content: center;--}}
{{--        color: #fff;--}}
{{--        perspective: 1000px;--}}
{{--    }--}}
{{--    section::before {--}}
{{--        content: "";--}}
{{--        position: absolute;--}}
{{--        height: 240px;--}}
{{--        width: 240px;--}}
{{--        border-radius: 50%;--}}
{{--        transform: translate(-150px, -100px);--}}
{{--        background: linear-gradient(90deg, #9c27b0, #f3f5f5);--}}
{{--    }--}}
{{--    section::after {--}}
{{--        content: "";--}}
{{--        position: absolute;--}}
{{--        height: 240px;--}}
{{--        width: 240px;--}}
{{--        border-radius: 50%;--}}
{{--        transform: translate(150px, 100px);--}}
{{--        background: linear-gradient(90deg, #9c27b0, #f3f5f5);--}}
{{--    }--}}
{{--    .container {--}}
{{--        display: flex;--}}
{{--        flex-wrap: wrap;--}}
{{--        justify-content: center;--}}
{{--        gap: 20px;--}}
{{--    }--}}
{{--    .container .card {--}}
{{--        height: 225px;--}}
{{--        width: 375px;--}}
{{--        transition: 0.6s;--}}
{{--        transform-style: preserve-3d;--}}
{{--    }--}}
{{--    .container .card:hover {--}}
{{--        transform: rotateY(180deg);--}}
{{--    }--}}
{{--    .container .card .front-face,--}}
{{--    .container .card .back-face {--}}
{{--        position: absolute;--}}
{{--        height: 100%;--}}
{{--        width: 100%;--}}
{{--        padding: 25px;--}}
{{--        border-radius: 25px;--}}
{{--        backdrop-filter: blur(25px);--}}
{{--        background: rgba(255, 255, 255, 0.1);--}}
{{--        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.25);--}}
{{--        border: 1px solid rgba(255, 255, 255, 0.1);--}}
{{--        backface-visibility: hidden;--}}
{{--    }--}}
{{--    .container .card .front-face header,--}}
{{--    .container .card .front-face .logo {--}}
{{--        display: flex;--}}
{{--        align-items: center;--}}
{{--    }--}}
{{--    .container .card .front-face header {--}}
{{--        justify-content: space-between;--}}
{{--    }--}}
{{--    .container .card .front-face .logo img {--}}
{{--        width: 48px;--}}
{{--        margin-right: 10px;--}}
{{--    }--}}
{{--    h5 {--}}
{{--        font-size: 16px;--}}
{{--        font-weight: 400;--}}
{{--    }--}}
{{--    .container .card .front-face .chip {--}}
{{--        width: 50px;--}}
{{--    }--}}
{{--    .container .card .front-face .card-details {--}}
{{--        display: flex;--}}
{{--        margin-top: 40px;--}}
{{--        align-items: flex-end;--}}
{{--        justify-content: space-between;--}}
{{--    }--}}
{{--    h6 {--}}
{{--        font-size: 10px;--}}
{{--        font-weight: 400;--}}
{{--    }--}}
{{--    h5.number {--}}
{{--        font-size: 18px;--}}
{{--        letter-spacing: 1px;--}}
{{--    }--}}
{{--    h5.name {--}}
{{--        margin-top: 20px;--}}
{{--    }--}}
{{--    .container .card .back-face {--}}
{{--        border: none;--}}
{{--        padding: 15px 25px 25px 25px;--}}
{{--        transform: rotateY(180deg);--}}
{{--    }--}}
{{--    .container .card .back-face h6 {--}}
{{--        font-size: 8px;--}}
{{--    }--}}
{{--    .container .card .back-face .magnetic-strip {--}}
{{--        position: absolute;--}}
{{--        top: 40px;--}}
{{--        left: 0;--}}
{{--        height: 45px;--}}
{{--        width: 100%;--}}
{{--        background: #000;--}}
{{--    }--}}
{{--    .container .card .back-face .signature {--}}
{{--        display: flex;--}}
{{--        justify-content: flex-end;--}}
{{--        align-items: center;--}}
{{--        margin-top: 80px;--}}
{{--        height: 40px;--}}
{{--        width: 85%;--}}
{{--        border-radius: 6px;--}}
{{--        background: repeating-linear-gradient(--}}
{{--            #fff,--}}
{{--            #fff 3px,--}}
{{--            #efefef 0px,--}}
{{--            #efefef 9px--}}
{{--        );--}}
{{--    }--}}
{{--    .container .card .back-face .signature i {--}}
{{--        color: #000;--}}
{{--        font-size: 12px;--}}
{{--        padding: 4px 6px;--}}
{{--        border-radius: 4px;--}}
{{--        background-color: #fff;--}}
{{--        margin-right: -30px;--}}
{{--        z-index: -1;--}}
{{--    }--}}
{{--    .container .card .back-face h5 {--}}
{{--        font-size: 8px;--}}
{{--        margin-top: 15px;--}}
{{--    }--}}


{{--</style>--}}
