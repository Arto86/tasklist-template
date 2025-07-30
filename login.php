<?php
require_once "isauth.php";

if (isAuth()) {
    header("Location: index.php");
}

require_once "bdd-crud.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM users WHERE email = ?");
    $request->execute([$_POST['email']]);
    $user = $request->fetchAll(PDO::FETCH_ASSOC);
    if ($user['password'] === $_POST['password']) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    } else {
        echo "Erreur dans l'email ou le mot de passe.";
    }

}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="" method="post">
        <input type="email" name="email" placeholder="Votre email">
        <input type="text" name="password" placeholder="Votre mot de passe">
        <button>Se connecter</button>
    </form>
    <a href="inscription.php">Pas de compte ? S'inscrire</a>
</body>
</html>