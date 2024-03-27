<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue sur notre plateforme bancaire</title>
</head>
<body>
<h1>Bienvenue {{ $compte->user->first()->prenom }}!</h1>

<p>Nous sommes ravis de vous accueillir sur notre plateforme bancaire.</p>

<p>Votre compte a été créé avec succès. Voici les informations relatives à votre compte :</p>

<ul>
    <li><strong>Nom complet :</strong> {{ $compte->user->first()->prenom }} {{ $compte->user->first()->nom }}</li>
    <li><strong>RIB :</strong> {{ $compte->rib }}</li>
    <li><strong>Type de compte :</strong> {{ $compte->typeCompte }}</li>
    <li><strong>CIN :</strong> {{ $compte->cin }}</li>
</ul>

<p>Votre solde initial est actuellement de {{ $compte->solde }} Fcfa.</p>

<p>Pour toute assistance supplémentaire ou en cas de questions, n'hésitez pas à nous contacter.</p>

<p>Merci de votre confiance et bienvenue chez Digicash !</p>
</body>
</html>
