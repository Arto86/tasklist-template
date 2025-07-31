<?php

require_once "isauth.php";
require_once "bdd-crud.php";
if (isAuth() === false) {
    header("Location: login.php");
}


$task = get_task($_GET['id']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Task</title>
</head>
<body>
    <div class="task">
        <h2><?= "$task[name]"?></h2>
        <p><?= "$task[description]"?></p>
        <p><?= "$task[urgent]"?></p>
        <a href="index.php">Retour</a>
        <a href="delete-task.php?id=<?= $task['id']?>">Supprimer</a>
    </div>
</body>
</html>