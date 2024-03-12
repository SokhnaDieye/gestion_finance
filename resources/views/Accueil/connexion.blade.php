<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="cssConnection/style.css">
    <title></title>
</head>

<body>

<div class="container" id="container">
    <div class="form-container sign-up">
        <form action="{{route('inscription')}}" method="post">
            @method('post')
            @csrf
            <h1>Creer Coompte</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>Vous pouvez utiliser votre adresse e-mail pour vous inscrire</span>
            <input type="text" name="prenom" placeholder="Prenom">
            <input  name="nom" type="text" placeholder="Nom">
            <input  name="email" type="email" placeholder="Email">
            <input  name="telephone" type="text" placeholder="Telephone">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">S’enregistrer</button>
        </form>
    </div>
    <div class="form-container sign-in">
        <form action="{{route('connexion')}}" method="post">
            @method('post')
            @csrf
            <h1>Ce Connecter</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>Vous pouvez utiliser adresse e-mail</span>
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Enregisté</button>
        </form>
    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <h1>Bienvenue!</h1>
                <p>Entrez vos données personnelles pour utiliser toutes les fonctionnalités du site</p>
                <button class="hidden" id="login">Connexion</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Bonjour, Chère amie!!</h1>
                <p>Inscrivez-vous avec vos données personnelles pour utiliser toutes les fonctionnalités du site</p>
                <button class="hidden" id="register">S’enregistrer</button>
            </div>
        </div>
    </div>
</div>

<script src="cssConnection/script.js"></script>
</body>

</html>
