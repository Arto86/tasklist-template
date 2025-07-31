<?php
require_once "isauth.php";
require_once "bdd-crud.php";
if (isAuth() === false) {
    header("Location: login.php");
}


$tasks = get_all_task($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir les taches</title>
</head>
<body>
    <header>
        <a href="login.php">Login</a>
        <a href="logout.php">Logout</a>
        <a href="inscription.php">Se créer un compte</a>
    </header>
    <h1>Liste des tâches</h1>
    <div class="tasks">
    <?php foreach ($tasks as $task):?>
        <div class="task">
            <h2><?= "$task[name]"?></h2>
            <p><?= "$task[description]"?></p>
            <p><?= "$task[urgent]"?></p>
            <a href="validate-task.php?id=<?= $task['id']?>">Valider</a>
            <a href="show-task.php?id=<?= $task['id']?>">Voir plus</a>
            <a href="delete-task.php?id=<?= $task['id']?>">Supprimer</a>
        </div>
    <?php endforeach ?>
    </div>
    <a href="add-task.php"><h2>Ajouter une tâche</h2></a>
</body>
</html>