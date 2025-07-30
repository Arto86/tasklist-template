<?php
require_once "isauth.php";


if (isAuth()) {
    header("Location: index.php");
}

require_once "bdd-crud.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    create_user($_POST['email'], $_POST['password']);
    if ($user_id === false) {
        echo "Email déjà utilisé...";
    }
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
   <form action="" method="post">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="password" placeholder="Mot de passe">
   <button type="submit">S'inscrire</button>
   </form>
   <a href="login.php">Vous avez déjà un compte ?</a>
</body>

</html>