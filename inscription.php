<?php
require_once "isauth.php";


if (isAuth()) {
    header("Location: index.php");
}

$error = null;
require_once "bdd-crud.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    create_user($_POST['email'], $_POST['password']);
    if ($user_id === false) {
        $error = "Email déjà utilisé";
    }
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>

<body>
    <header>

    </header>
    <main>
        <form action="" method="post">
            <div class="container">
            <div class="field-container">
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="field-container">
                <input type="text" name="password" placeholder="Mot de passe">
            </div>
            </div>
            <button type="submit">
                <div class="ovale"></div>
                <div class="ovale signup"><p>S'inscrire</p></div>
            </button>
        </form>
        <div class="more">
            <?php
                if (isset($error)) :?>
                <h2><?= $error;?></h2>
            <?php endif?>
            <a href="login.php">Vous avez déjà un compte ?</a>
        </div>
        </main>
    <footer>

    </footer>
</body>

</html>