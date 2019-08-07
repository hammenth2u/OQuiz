
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Envoi d'un email par formulaire</title>
</head>

<body>
    <?php
    $retour = mail($connectedUser->email, 'Envoi depuis le site Free', $_POST, 'From : clara.hammenthienne@gmail.com');
    if ($retour) {
        echo '<p>Votre message a bien été envoyé !</p>';
    }
    ?>
</body>

</html>