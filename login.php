<?php
require_once "isauth.php";

if (isAuth()) {
    header("Location: index.php");
}

require_once "bdd-crud.php";
$error = null;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $database = connect_database();
    $request = $database->prepare("SELECT * FROM users WHERE email = ?");
    $request->execute([$_POST['email']]);
    $user = $request->fetch(PDO::FETCH_ASSOC);
    if (password_verify(htmlspecialchars($_POST['password']), $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    } else {
        $error = "Mauvais mot de passe";
    }

}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Outfit&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
    <header>
        <div class="animatebubble">
            <img class="bubble bubble1" height=170px width=170px src="assets/clear-deco-bubble-balloon-20-1pc-12298-p.png" alt="bulle">
            <img class="bubble bubble2" height=100px width=100px src="assets/clear-deco-bubble-balloon-20-1pc-12298-p.png" alt="bulle">
            <img class="bubble bubble3" height=120px width=120px src="assets/clear-deco-bubble-balloon-20-1pc-12298-p.png" alt="bulle">
            <img class="bubble bubble4" height=150px width=150px src="assets/clear-deco-bubble-balloon-20-1pc-12298-p.png" alt="bulle">
            <img class="bubble bubble5" height=70px width=70px src="assets/clear-deco-bubble-balloon-20-1pc-12298-p.png" alt="bulle">
        </div>
    </header>
    <main>
        <h1>Connectez-vous</h1>
        <form action="" method="post">
            <div class="container">
            <div class="field-container">
                <input type="email" name="email" placeholder="Votre email">
            </div>
            <div class="field-container">
                <input type="text" name="password" placeholder="Votre mot de passe">
            </div>
            </div>
            <button type="submit">
                <div class="ovale"></div>
                <div class="ovale signup"><p>Se connecter</p></div>
            </button>
        </form>
        <div class="more">
        <?php
            if (isset($error)) :?>
            <h2><?= $error;?></h2>
        <?php endif?>
            <a href="inscription.php" class="linksignup">Pas de compte ? S'inscrire</a>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>