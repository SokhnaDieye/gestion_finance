<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification de transaction</title>
</head>
<body>
<h1>Confirmation de transaction</h1>

<p>Bonjour {{ $compte->user->first()->prenom }},</p>

<p>Une transaction a été effectuée sur votre compte :</p>
<ul>
    <li><strong>Type :</strong> {{ $type }}</li>
    <li><strong>Montant :</strong> {{ $montant }} FCFA</li>
</ul>

<p>Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter.</p>

<p>Cordialement,<br>L'équipe de Digicash</p>
</body>
</html>
