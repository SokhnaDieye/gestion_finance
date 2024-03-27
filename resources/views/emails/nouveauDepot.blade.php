<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau dépôt sur votre compte</title>
</head>
<body>
<h1>Bonjour {{ $compte->user->first()->prenom}},</h1>
<p>Un nouveau dépôt d'un montant de {{ $montant }} FCFA a été effectué sur votre compte.</p>
<p>Voici les détails du dépôt :</p>
<ul>
    <li>Montant du dépôt : {{ $montant }} FCFA</li>
    <li>Solde actuel de votre compte : {{ $compte->solde }} FCFA</li>
    <li>Date du dépôt : {{ now()->format('d/m/Y H:i:s') }}</li>
</ul>
<p>Merci d'utiliser Digicash.</p>
</body>
</html>
