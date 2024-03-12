<div class="navigation">
    <ul>
        <li>
            <a href="#">
                        <span class="icon">
                            {{--<ion-icon name="logo-apple"></ion-icon>--}}
                            <i class="fas fa-university" style="font-size: 2em;"></i>
                        </span>
                <span class="title">DigitalCash.</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                <span class="title">Creer Compte</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                <span class="title">Messages</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                <span class="title">Help</span>
            </a>
        </li>

        <li>
            <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                <span class="title">Settings</span>
            </a>
        </li>
        <li>
            <a href="#">
             <span class="icon">
                    <ion-icon class="ico" name="log-out-outline"></ion-icon>
             </span>
            <form class="icon" method="POST" action="{{ route('logout') }}">
                  <span class="title">
                        @csrf
                    <button>Deconnection</button>
                  </span>
            </form>
            </a>
        </li>
    </ul>
</div>
<style>
 /*   .ico{
        padding: 10px 10px;
        font-size: 2em;
        color: white
    }
    .ico:hover{
        color: darkblue;
    }*/
    button{
        margin-top: -60px;
        margin-left: 5px;
        background: inherit;
        border: none;
        color: white;
        font-size: medium
    }
    button:hover {
        color: darkblue;
    }
</style>
