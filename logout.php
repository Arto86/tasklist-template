<?php
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disconnect</title>
</head>
<body>
    <h1>Souriez! Vous êtes déconnecté...</h1>
    <a href="login.php"><h2>Vos tâches vous attendent... Connectez-vous!</h2></a>
    <a href="inscription.php"><h2>C'était le compte d'un(e) ami(e) ?</h2></a>
</body>
</html>